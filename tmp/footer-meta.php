<?php //本文下部分、投稿者など
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;

// if (get_the_author()) {
//   $author_id = get_the_author_meta( 'ID' );
//   $profile_page_url = get_the_author_profile_page_url($author_id);
//   if ($profile_page_url) {
//     $url = $profile_page_url;
//   } else {
//     $url = get_author_posts_url( $author_id );
//   }
//   $name = get_the_author();
// } else {
//   $url = home_url();
//   $name = get_bloginfo('name');
// }
$name = get_the_author();
$name = $name ? $name :  get_bloginfo('name');
 ?>
<div class="footer-meta">
  <div class="author-info">
    <a href="<?php echo get_the_author_twitter_url() ; ?>" class="author-link">
      <span class="post-author vcard author" itemprop="editor author creator copyrightHolder" itemscope itemtype="https://schema.org/Person">
        <span class="author-name fn" itemprop="name"><?php echo esc_html($name) ; ?></span>
      </span>
    </a>
  </div>
</div>
