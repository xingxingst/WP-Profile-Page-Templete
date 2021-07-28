<?php //通常ページとAMPページの切り分け
/*
Template Name: portfolio
Template Post Type: page
@author: xingxing
 @link: https://www.trade-tech-note.work/
@license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
*/

if ( !defined( 'ABSPATH' ) ) exit;

if (!is_amp()) {
  get_template_part('tmp/header-portfolio');
 } else {
   get_template_part('tmp/amp-header');
 }
?>


<?php //固定ページ内容
get_template_part('tmp/page-pf-contents'); ?>

<?php //footer
get_template_part('tmp/pf-footer'); ?>
