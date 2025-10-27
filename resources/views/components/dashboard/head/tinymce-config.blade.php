<script src="https://cdn.tiny.cloud/1/{{config('services.tiny-mce_key')}}/tinymce/8/tinymce.min.js"
        referrerpolicy="origin"
        crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: 'textarea#tiny-mce-editor', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>

