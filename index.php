<?php
include_once ('config.php');  
if (empty($styles))
{
$style_path = "./themes/default";
}
elseif (file_exists("./themes/$styles/index.tpl"))
{
$style_path = "./themes/$styles";
}
else
{
$style_path = "./themes/default";
}
$pages = empty($_GET['page'])?null:$_GET['page'];
htmlentities(trim($pages));
if (empty($pages))
{
include ("./$folder_name/main.$file_ext");
}
elseif (file_exists("./$folder_name/$pages.$file_ext"))
{
include ("./$folder_name/$pages.$file_ext");
}
else
{
include ("./$folder_name/404.$file_ext");
}
$templ = @file_get_contents ("$style_path/index.tpl");    
$templ = str_replace ("{title}", $title, $templ);               
$templ = str_replace ("{content}", $content, $templ);           
$templ = str_replace ("{style_path}", $style_path, $templ);     
$templ = str_replace ("{page}", $pages, $templ);                

echo $templ;
?>