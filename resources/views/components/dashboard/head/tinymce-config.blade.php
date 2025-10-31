@vite('js/tinymce/tinymce.js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        tinymce.init({
            selector: 'textarea#tiny-mce-editor', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'link code table lists image',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
            license_key: 'gpl'
        });
    });
</script>

