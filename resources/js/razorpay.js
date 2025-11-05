import axios from 'axios';

document.addEventListener('DOMContentLoaded', () => {
    const payBtn = document.getElementById('razorpay-btn');
    payBtn?.addEventListener('click', async () => {
        const route = payBtn.dataset.route;
        const response = await axios.post(route);
        if (response.status === 200) {
            console.table(response.data.razorPayOrder)
            initializeRazorpay(response.data.razorPayOrder)
        } else if (response.status === 400) {
            alert(response.data.error);
            console.error(response.data.message)
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
            console.log(response)
            verifyPayment(response, orderData.receipt);
        },
        theme: {
            color: "#09131c"
        },
        modal: {
            ondismiss: function () {
                // Payment cancelled
                alert('Payment cancelled');
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
    }
}
