<form id="form1" name="form1" method="post" action="">
    <select name="a">
        <option value="1">1</option>
        <option value="2">2</option>
    </select>
    <input type="submit" />
</form>
<?php
echo $_POST['a'];
?>