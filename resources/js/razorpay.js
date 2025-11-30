import axios from 'axios';
import {Button} from './button.js';

document.addEventListener('DOMContentLoaded', () => {
    const payBtn = document.getElementById('razorpay-btn');
    const btn = new Button(payBtn);

    payBtn?.addEventListener('click', async () => {
        btn.toggleLoad();
        const route = payBtn.dataset.route;
        const response = await axios.post(route);
        if (response.status === 200) {
            console.table(response.data.razorPayOrder)
            initializeRazorpay(response.data.razorPayOrder)
            btn.toggleLoad();
        } else if (response.status === 400) {
            toast.show(response.data.error, 'error')
            btn.toggleLoad();
        } else {
            toast.show('Something gone wrong!', 'error');
        }
    })
})

async function initializeRazorpay(orderData) {
    const options = {
        key: import.meta.env.VITE_RAZORPAY_KEY,
        amount: orderData.amount,
        currency: orderData.currency,
        order_id: orderData.id,
        name: "Aviato",
        description: "Order Payment",
        // image: "https://your-website.com/logo.png",
        handler: function (response) {
            verifyPayment(response, orderData.receipt);
        },
        theme: {
            color: "#09131c"
        },
        modal: {
            ondismiss: function () {
                // Payment cancelled
                toast.show('Payment cancelled', 'warning');
            }
        }
    };

    const razorpay = new Razorpay(options);
    razorpay.open();
}

async function verifyPayment(paymentResponse, receipt) {
    const options = {
        razorpay_order_id: paymentResponse.razorpay_order_id,
        razorpay_payment_id: paymentResponse.razorpay_payment_id,
        razorpay_signature: paymentResponse.razorpay_signature,
        receipt: receipt,
    }

    const response = await axios.post('/checkout/payment/razorpay/verify', options);
    if (response.status < 500) {
        window.location.href = '/checkout/payment/confirmation';
    } else {
        toast.show('Payment verification failed !', 'error');
    }
}
