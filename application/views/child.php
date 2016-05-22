<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>The Popup Window [ JavaScript: Controlling a Popup Window's Parent Window ]</title>
</head>
<body>
<script type="text/javascript" language="JavaScript">
<!--
var parent_window = window.opener;
var bgcolor_index = 0;
var h1font_index = 0;
var para1_index = 0;
var para2_index = 0;

function backgroundColor() {
  var colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#00ffff', '#cccccc', '#ffffff'];
  if (parent_window && !parent_window.closed) {
    parent_window.document.body.style.backgroundColor = colors[bgcolor_index];
    if (++bgcolor_index > colors.length - 1) { bgcolor_index = 0; }
  }
}

function h1TitleFontFamily() {
  var fonts = ['Arial', 'Helvectica', 'Sans Serif', 'Verdana', 'Times New Roman'];
  if (parent_window && !parent_window.closed) {
    var page_title = parent_window.document.getElementById('page_title');
    page_title.style.fontFamily = fonts[h1font_index];
    if (++h1font_index > fonts.length - 1) { h1font_index = 0; }
  }
}

function paragraph1FontSize() {
  var sizes = ['8pt', '12pt', '16pt', '20pt', '32pt', '64pt'];
  if (parent_window && !parent_window.closed) {
    var paragraph1 = parent_window.document.getElementById('paragraph1');
    paragraph1.style.fontSize = sizes[para1_index];
    if (++para1_index > sizes.length - 1) { para1_index = 0; }
  }
}

function paragraph2FontStyle() {
  var styles = ['oblique', 'italic', 'normal'];
  if (parent_window && !parent_window.closed) {
    var paragraph2 = parent_window.document.getElementById('paragraph2');
    paragraph2.style.fontStyle = styles[para2_index];
    paragraph2.style.fontWeight = 'bold';
    if (++para2_index > styles.length - 1) {
      para2_index = 0;
      paragraph2.style.fontWeight = '';
    }
  }
}

function reloadParent() {
  if (parent_window && !parent_window.closed) {
    parent_window.location.reload(true);
  }
}
// -->
</script>
<h1 align="center">The Popup Window</h1>
<table width="100%" border="0" cellpadding="10" cellspacing="0">
<tr>
<td align="center" valign="middle"><input type="button" name="button1" id="button1" value="Background Color" onclick="backgroundColor();" /></td>
<td align="center" valign="middle"><input type="button" name="button2" id="button2" value="H1 Title Font Family" onclick="h1TitleFontFamily();" /></td>
</tr>
<tr>
<td align="center" valign="middle"><input type="button" name="button3" id="button3" value="Paragraph 1 Font Size" onclick="paragraph1FontSize();" /></td>
<td align="center" valign="middle"><input type="button" name="button4" id="button4" value="Paragraph 2 Font Style" onclick="paragraph2FontStyle();" /></td>
</tr>
<tr>
<td align="center" valign="middle" colspan="2"><input type="button" name="button5" id="button5" value="Reload Parent Window" onclick="reloadParent();" /></td>
</tr>
</table>
</body>
</html>
