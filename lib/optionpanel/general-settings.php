<?php if(isset($_POST['submit'])){
        update_option('esl_embedcode',stripslashes_deep($_POST['esl_embedcode']));
}?>
<form  name="esl_form" method="post"><?php $esl_embedcode = get_option('esl_embedcode'); ?>
<h3>Easy Store Locator Settings Panel</h3>

<table class="form-table">
    <tr valign="top">
        <th scope="row"><label>Paste You Embed Code Here </label></th>
        <td><textarea  id="esl_embedcode" style="width:40%;height:100px;" name="esl_embedcode"><?php esc_html_e($esl_embedcode); ?></textarea></td>
       </tr>
</table>
    
 
    <input type="submit" name="submit" value="Submit" class="button button-primary"/>
</form> 