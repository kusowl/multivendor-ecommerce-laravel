export class Button {
    constructor(buttonElement) {
        // Add null checks and safe property access
        if (!buttonElement) {
            console.error('Button constructor: No element provided');
            return;
        }

        this.element = buttonElement;
        this.isLoading = false;
        this.spinner = buttonElement.querySelector('.loading-spinner');
        this.icon = buttonElement.querySelector('.lucide');

        console.log('Button initialized:', {
            element: this.element,
            text: this.originalText,
            tagName: this.element.tagName
        });
    }

    toggleLoad() {
        if (!this.element) return;

        this.isLoading = !this.isLoading;

        if (this.isLoading) {
            this.element.disabled = true;
            // Show spinner - keep the SVG but add loading state
            if (this.spinner) {
                this.spinner.classList.remove('hidden');
            }
            // hide the icon
            if (this.icon) {
                this.icon.classList.add('hidden');
            }
        } else {
            // Hide spinner
            if (this.spinner) {
                this.spinner.classList.add('hidden');
            }
            // show the icon
            if (this.icon) {
                this.icon.classList.remove('hidden');
            }
            this.element.disabled = false;
        }
    }
}


window.Button = Button;
