<?php //グローバルナビ
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */ ?>
<!-- Navigation -->
<nav id="navi" class="navi cf" itemscope itemtype="https://schema.org/SiteNavigationElement">
  <div id="navi-in" class="navi-in wrap cf">
    <?php //ヘッダーナビ
    wp_nav_menu(
      array (
        //カスタムメニュー名
        'theme_location' => 'portfolio-navi',
        //ul 要素に適用するCSS クラス名
        'menu_class' => 'menu-top menu-header menu-pc',
        //コンテナを表示しない
        'container' => false,
        //カスタムメニューを設定しない際に固定ページでメニューを作成しない
        'fallback_cb' => false,
        //出力されるulに対してidやclassを表示しない
        //'items_wrap' => '<ul>%3$s</ul>',
        //説明出力用
        'walker' => new menu_description_walker()
      )
    ); ?>
  </div><!-- /#navi-in -->
</nav>
<nav id="s-navi" class="pcnone">
  <dl class="acordion">
  <dt class="trigger"></dt>
  <div id="nav-drawer">
    <input id="nav-input" type="checkbox" class="nav-unshown">
    <label id="nav-open" for="nav-input"><span></span></label>
    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
    <div id="nav-content">
      <!--中身-->
      <div class="hamburger-top">MENU<label class="cancel" for="nav-input"></label></div>
      <?php
        
          $defaults = array(
            'theme_location' => 'portfolio-navi-mobile',
          );

        ?>
        <?php wp_nav_menu( $defaults ); ?>
      </div>
    </div>
    <!--中身ここまで-->
  </dl>
</nav>
<!-- /Navigation -->
