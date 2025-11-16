export default class Toast {

    classMapping = {
        info: "alert-info",
        success: "alert-success",
        warning: "alert-warning",
        error: "alert-error"
    }

    constructor() {
        this.toast = document.getElementById('toast');
        this.fade =
            [
                {
                    opacity: 1,
                    scale: 'initial'
                },
                {
                    opacity: 0,
                    scale: '0%'
                }
            ];
        this.animation =
            {
                duration: 350,
                easing: 'ease-in-out',
                fill: 'forwards'
            };
        this.timeouts = new Map();
    }

    show(message = 'Hello', type = 'info', duration = 5000) {

        let alertType = this.classMapping.info;
        if (type in this.classMapping) {
            alertType = this.classMapping[type];
        }

        // Construct the alert for toast
        let toastBody = document.createElement("div");
        toastBody.innerHTML = `
           <div class="alert ${alertType}">
                <span>${message}</span>
                <span onclick="toast.close(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </span>
           </div>`;

        // Add toast to the page
        this.toast.appendChild(toastBody);

        // Set a default close timer
        if (duration > 0) {
            const timeoutId = setTimeout(() => {
                // Get the alert element within this specific toastBody
                const alertElement = toastBody.querySelector('.alert');
                if (alertElement) {
                    this.close(alertElement);
                }
                this.timeouts.delete(toastBody);
            }, duration);

            // Store timeout reference with the toast body
            this.timeouts.set(toastBody, timeoutId);
        }
    }

    close(alert) {
        const toastBody = alert.parentElement;
        if (toastBody) {
            // Clear the default close timer
            if (this.timeouts.has(toastBody)) {
                clearTimeout(this.timeouts.get(toastBody));
                this.timeouts.delete(toastBody);
            }
            const animation = toastBody.animate(this.fade, this.animation)

            // Remove element after animation completes
            animation.onfinish = () => {
                toastBody.remove();
            };
        }
    }
}
