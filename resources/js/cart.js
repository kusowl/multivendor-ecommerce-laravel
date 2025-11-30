export async function fetchCart() {
    const cartIndictor = document.getElementById('cart-indicator');
    try {
        const response = await axios.get('/api/cart');
        if (response.status === 200) {
            cartIndictor.innerText = response.data.productCount;
        }
    } catch (e) {
        cartIndictor.innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"#f66151\" stroke-width=\"3\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-badge-alert-icon lucide-badge-alert\"><path d=\"M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z\"/><line x1=\"12\" x2=\"12\" y1=\"8\" y2=\"12\"/><line x1=\"12\" x2=\"12.01\" y1=\"16\" y2=\"16\"/></svg>";
        console.log(e);
    }
}

export async function addToCart(productSlug, quantity, buttonElement) {
    const button = new Button(buttonElement);
    button.toggleLoad()

    const cartData = {
        'product_quantity': quantity,
        'product_slug': productSlug
    };

    try {
        const response = await axios.post('/api/cart', cartData);
        const data = response.data;
        toast.show('added to Cart !', 'success');
        button.toggleLoad()

        await fetchCart()
    } catch (error) {
        if (error.response.status === 401) {
            window.location.href = '/login'
        } else if (error.response.status === 418) {
            window.location.reload();
        } else {
            toast.show('Something gone wrong!', 'error');
            console.error('Something gone wrong');
        }
        button.toggleLoad()
        await fetchCart()
    }
}

export async function buyNow(productSlug, quantity, buttonElement) {
    const button = new Button(buttonElement);
    button.toggleLoad()

    const cartData = {
        'product_quantity': quantity,
        'product_slug': productSlug
    };

    try {
        const response = await axios.post('/checkout/entry/buynow', cartData);
        const data = response.data;
        toast.show('added to Cart !', 'success');
        button.toggleLoad()

    } catch (error) {
        if (error.response.status === 401) {
            window.location.href = '/login'
        } else if (error.response.status === 418) {
            window.location.reload();
        } else {
            toast.show('Something gone wrong!', 'error');
            console.error('Something gone wrong');
        }
        button.toggleLoad()

    }
}

export function getQty(btn) {
    return btn.closest('.flex').querySelector('input[name="product_quantity"]').value;
}

export function increaseQty(btn) {
    const input = btn.parentElement.querySelector('input[name="product_quantity"]');
    input.value = parseInt(input.value) + 1;
}

export function decreaseQty(btn) {
    const input = btn.parentElement.querySelector('input[name="product_quantity"]');
    const current = parseInt(input.value);

    if (current > 1) {
        input.value = current - 1;
    }
}

