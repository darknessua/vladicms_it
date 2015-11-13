<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
<div class="error_add_news">%error%</div>
<form name="add_news" action="" method="post"> 
<table>
    
    <b>Titolo</b><br/>
    <input type="text" name="title" size="60" value=""/><br/><hr>
    <b>Categoria</b><br />
    %category%
    <b>Keywords (Inserisci parole chiavi separati dalla virgola)</b><br/>
    <input type="text" name="meta_key" value="" /><br /><hr>
    <b>Descrizione</b><br/>
    <input type="text" name="meta_desc" value=""/><br /><hr>
    <b>Short Story</b><br/>
    <textarea name="short_story" rows="10" cols="60">%value_short%</textarea><br /><hr>
    <b>Full Story</b><br/>
    <textarea name="full_story" rows="20" cols="60">%value_full%</textarea><br />
    <hr>
    <center><input type="submit" name="add_article" value="Pubblica" /></center>
    
    
</table>
    </form> 