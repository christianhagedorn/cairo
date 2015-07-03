/*
  +----------------------------------------------------------------------+
  | For PHP Version 7                                                    |
  +----------------------------------------------------------------------+
  | Copyright (c) 2015 Elizabeth M Smith                                 |
  +----------------------------------------------------------------------+
  | http://www.opensource.org/licenses/mit-license.php  MIT License      |
  | Also available in LICENSE                                            |
  +----------------------------------------------------------------------+
  | Author: Elizabeth M Smith <auroraeosrose@gmail.com>                  |
  +----------------------------------------------------------------------+
*/

#ifndef PHP_CAIRO_INTERNAL_H
#define PHP_CAIRO_INTERNAL_H

#include <php.h>
#include <cairo.h>

extern zend_class_entry *ce_cairo_exception;
extern zend_class_entry *ce_cairo_status;
extern zend_class_entry *ce_cairo_matrix;

cairo_matrix_t *cairo_matrix_object_get_matrix(zval *zv);

/* Classes to register */
PHP_MINIT_FUNCTION(cairo_pattern);
PHP_MINIT_FUNCTION(cairo_region);

PHP_MINIT_FUNCTION(cairo_matrix);
PHP_MINIT_FUNCTION(cairo_exception);
PHP_MINIT_FUNCTION(cairo_rectangle);

#endif /* PHP_CAIRO_INTERNAL_H */

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */
