<?php //ポートフォリオコンテンツメイン
/**
 * this code depends on cocoon child theme.
 * @author: xingxing
 * @link: https://www.trade-tech-note.work/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if (!defined('ABSPATH')) exit; 
$portfolioIMG = get_stylesheet_directory_uri() . '/assets/img/'; 
?>
<div id="profile" class="narrow-contet-in content-in wrap">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post(); ?>

        <h2 class="content-title"><span>Profile</span></h2>
        <div class="profile-image">
          <img src="<?=esc_html($portfolioIMG)?>rapid.jpg" alt="Profile-photo">
        </div>

        <div class="entry-content cf<?php echo get_additional_entry_content_classes(); ?>">
          <?php //記事本文の表示。ここに自己紹介を書く
          the_content(); ?>
        </div>


        <footer class="article-footer entry-footer">
          <!-- publisher設定 -->
          <?php
          $home_image_url = get_amp_logo_image_url();
          $size = get_image_width_and_height($home_image_url);
          $width = isset($size['width']) ? $size['width'] : 600;
          $height = isset($size['height']) ? $size['height'] : 60;

          $sizes = calc_publisher_image_sizes($width, $height);
          $width = $sizes ? $sizes['width'] : 600;
          $height = $sizes ? $sizes['height'] : 60;
          ?>
          <div class="publisher" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
            <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
              <img src="<?php echo esc_html($home_image_url); ?>" width="<?php echo esc_html($width); ?>" height="<?php echo $height; ?>" alt="">
              <meta itemprop="url" content="<?php echo esc_html($home_image_url); ?>">
              <meta itemprop="width" content="<?php echo esc_html($width); ?>">
              <meta itemprop="height" content="<?php echo esc_html($height); ?>">
            </div>
            <div itemprop="name"><?php bloginfo('name'); ?></div>
          </div>
        </footer>

    <?php
      } // end while
    } //have_posts end if 
    ?>
</div>
<div id="skills" class="">
  <div class="content-in wrap">
    <?php 
    $skillArray = [
      [
        'icon' => 'fa-code',
        'h' => 'Design/Cording',
        'description' => '基本から応用的なことまで一通りできます。pugなどもたまに使います。',
        'skills'=> [['HTML', '5', 4, false], ['CSS/SCSS', '5', 4, false], ['XAML(WPF)', '1', 3, false]] // [skill, experience, ☆, ☆half]
      ],
      [
        'icon' => 'fa-window-maximize',
        'h' => 'Front-end',
        'description' => 'WordPressやlaravelにて一緒に使うことが多いです。',
        'skills'=> [['javascript', '5', 4, false], ['jQuery', '5', 4, false]]
      ],
      [
        'icon' => 'fa-cogs',
        'h' => 'Back-end',
        'description' => 'PHPが最も使う言語です。pythonはスクレイピング/顔認識/暗号資産自動売買で使用しました。',
        'skills'=> [['PHP', '5', 5, false], ['python', '3', 4, true],['C#(WPF)', '1', 3, false]]
      ],
      [
        'icon' => 'fa-database',
        'h' => 'DataBase',
        'description' => 'PostgreSQLはlaravelで、MySQLはそれ以外で使用。',
        'skills'=> [['MySQL/MariaDB', '5', 4, false], ['PostgreSQL', '1', 3, false]]
      ],
      [
        'icon' => 'fa-server',
        'h' => 'Server',
        'description' => '現在カーディラーサイトのEC2を自ら構築から運用まで行っております。',
        'skills'=> [['Apache', '5', 5, false], ['Nginx', '1', 3, false],['AWS', '半', 3, false]]
      ],
      [
        'icon' => '',
        'h' => 'etc..',
        'description' => '開発等で使用したツールやFWです。',
        'skills'=> [['WordPress', '5', 5, false], ['laravel', '1', 4, false],['git', '3', 3, true]]
      ],
    ];
    ?>
    <h2 class="content-title"><span>Skills</span></h2>
    <?php foreach ($skillArray as $skill) { ?>
    <div class="column-half">
      
      <h3><i class="fa <?=esc_html($skill['icon'])?>" aria-hidden="true"></i><?=esc_html($skill['h'])?></h2>
      <p><?=$skill['description']?></p>
      <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">技術</th>
              <th scope="col">経験年数</th>
              <th scope="col">Level</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($skill['skills'] as $skillInfo) {
          ?>
            <tr>
              <th scope="row"><?=esc_html($skillInfo[0])?></th>
              <td><?=$skillInfo[1]?>年</td>
              <td>
                <span class="rating-star">
                  <?php for ($i=0; $i < $skillInfo[2]; $i++) { 
                    echo '<span class="fa fa-star" aria-hidden="true"></span>';
                  }
                  echo esc_html($skillInfo[3]) ? '<span class="fa fa-star-half-o" aria-hidden="true"></span>' : '';
                  $leftrate = 5 - $skillInfo[2] - (int)$skillInfo[3];
                  for ($i=0; $i < $leftrate; $i++) {
                    echo '<span class="fa fa-star-o" aria-hidden="true"></span>';
                  }
                  ?>
                </span>
              </td>
          <?php 
          }?>
          </tbody>
        </table>
    </div>
    <?php 
    }
    ?>
 </div> <!--  end of content wrap -->
</div>
<div id="works">
  <div class="content-in wrap">
    <h2 class="content-title"><span>Works</span></h2>
    <div class="flex-one">
      <div class="works-item">
        <a class="wp-resize-plugin" href="https://github.com/xingxingst/resize-for-discover">
          <div class="fa fa-plug" aria-hidden="true"></div>
        </a>
        <h3 class="work-title"><a href="https://github.com/xingxingst/resize-for-discover">WordPressプラグイン</a></h3>
        <p>Google Discoverに適した大きさ・対比の画像をワンクリックで生成するWordPressプラグインです。</p>
      </div>
    </div>
    <div class="flex-one">
      <div class="works-item">
        <a href="https://www.trade-tech-note.work/">
          <img class="blog-thumb" src="<?=esc_html($portfolioIMG)?>blog-screenshot.png" alt="blog-screenshot">
        </a>
        <h3 class="work-title works-middle"><a href="https://www.trade-tech-note.work/">ブログ</a></h3>
        <p>プログラミングから自作PCから電子工作までITに関わることならなんでも書くブログです。</p>
      </div>
    </div>
    <div class="flex-one">
      <div class="works-item">
        <a href="https://github.com/xingxingst/WP-Profile-Page-Templete">
            <div class="fa fa-github" aria-hidden="true"></div>
        </a>
        <h3 class="work-title"><a href="https://github.com/xingxingst/WP-Profile-Page-Templete">ポートフォリオ</a></h3>
        <p>自分のこのポートフォリオサイトのコードを掲載。</p>
      </div>
    </div>
  </div>
</div>
<div id="archives">
  <div class="content-in wrap">
    <h2 class="content-title console-font"><span>Blog archives</span></h2>
    <?=do_shortcode('[recent_post_list type=large_thumb_on bold=1]')?>
  </div>
</div>
<div id="contact">
  <div class="content-in narrow-contet-in wrap">
    <div class="contact-content">
      <h2 class="content-title console-font"><span>CONTACT</span></h2>
      <div class="content-in">
        <div class="flex-one">
          <a href="<?=esc_url(get_permalink(get_page_by_path('contact')->ID))?>">
            <img src="<?=esc_html($portfolioIMG)?>blogicon.png" alt="" id="blogicon">
            <p>ブログフォーム</p>
          </a>
        </div>
        <div class="flex-one">
          <a href="https://twitter.com/xingxin_tech">
            <img src="<?=esc_html($portfolioIMG)?>Twitter-logo.png" alt="" id="twitter-logo">
            <p>Twitter</p>
          </a>
        </div>
      </div>
      <p>お問合わせはフォームかSNSからご連絡をください。</p>
    </div>
  </div>
</div>