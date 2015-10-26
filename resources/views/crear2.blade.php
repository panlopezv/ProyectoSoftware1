
<script type="text/javascript" src="http://localhost/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector : "#contenido",
    //plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
});
</script>
<script>
  function prueba(){
    alert(tinymce.activeEditor.getContent());
  }  
</script>
<form method="post" action="somepage">
        <h2>Popo</h2>
        <textarea id="contenido" name="contenido" cols="85" rows="10"></textarea>
        <button onclick="prueba()">Probar</button>
</form>