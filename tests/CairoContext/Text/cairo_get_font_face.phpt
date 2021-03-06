--TEST--
cairo_get_font_face() function
--SKIPIF--
<?php
if(!extension_loaded('cairo')) die('skip - Cairo extension not available');
?>
--FILE--
<?php
$surface = cairo_image_surface_create(CAIRO_FORMAT_ARGB32, 50, 50);
var_dump($surface);

$context = cairo_create($surface);
var_dump($context);

var_dump($orig_face = cairo_get_font_face($context));

include(dirname(__FILE__) . '/create_toyfont.inc');

cairo_set_font_face($context, $fontface);
var_dump($face1 = cairo_get_font_face($context));
var_dump($face1 === $fontface);
var_dump($orig_face === $face1);

// bad type hint is an E_RECOVERABLE_ERROR, so let's hook a handler
function bad_class($errno, $errstr) {
	echo 'CAUGHT ERROR: ' . $errstr, PHP_EOL;
}
set_error_handler('bad_class', E_RECOVERABLE_ERROR);

// check number of args - should accept ONLY 1
cairo_get_font_face();
cairo_get_font_face($context, 1);

// check arg types, should be context object
cairo_get_font_face(array());
die; // DO NOT REMOVE THIS - fixes issue in 5.3 with GC giving bogus memleak reports
?>
--EXPECTF--
object(CairoImageSurface)#%d (0) {
}
object(CairoContext)#%d (0) {
}
object(CairoToyFontFace)#%d (0) {
}
object(CairoToyFontFace)#%d (0) {
}
bool(true)
bool(false)

Warning: cairo_get_font_face() expects exactly 1 parameter, 0 given in %s on line %d

Warning: cairo_get_font_face() expects exactly 1 parameter, 2 given in %s on line %d
CAUGHT ERROR: Argument 1 passed to cairo_get_font_face() must be an instance of CairoContext, array given

Warning: cairo_get_font_face() expects parameter 1 to be CairoContext, array given in %s on line %d