<?php
get_header();

$sections = get_field('sections', 'options');
$args_posts = [
    'post_type' => 'post', 
    'posts_per_page' => -1, 
    'orderby' => 'title', 
    'order' => 'ASC'
];
$results = new WP_Query($args_posts);

?>
<style>
    
    .section-container {
        min-height: 240px;
        position: relative;
        transition: background 1.5s linear;
        -webkit-transition: background 1.5s linear;
    }

    .section-bg-animate {
        padding-bottom: 40px;
    }

    #footer-container {
        background-color: black;
        min-height: 250px
    }
</style>

<script>
    (function($) {
        $(document).ready(() => {
            var sectionBg = $('.section-bg-animate');
            sectionBg.each((index, element) => {
                var data = $(element).data();
                var galleries = _.isArray(data.galleries) ? data.galleries : [];
                if (_.isEmpty(galleries)) return false;
                $(element).parents('.section-container').css({
                    'min-height': 500,
                    'background': `transparent url(${galleries[0]}) no-repeat center center`,
                    'background-size': 'cover'
                });

                setInterval(() => {
                    let index = _.random(0, galleries.length - 1);
                    let url = galleries[index];
                    let parentSection = $(element).parents('.section-container');
                    //parentSection.fadeTo('slow', 0.5, function(){
                        parentSection.css({
                            'background': `transparent url(${url}) no-repeat center center`,
                            'background-size': 'cover'
                        });
                    //}).fadeTo('slow', 1);
                    
                }, 5000);
            });
        })
    })(jQuery);
</script>
  <div id="page" class="site">
    <?php get_header('home'); ?>
    <div id="content" class="site-content">

        <?php
        
        if ($results->have_posts(  )) {
            $key = 1;
            $galleries = [];
            $header_top = null;
            $header_bottom = null;
            $background_color = null;
            $background_image = null;
            $background_size = null;
            while($results->have_posts()): $results->the_post();
        
               $shortcodes_custom_css = get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );
                if ( ! empty( $shortcodes_custom_css ) ) {
                    $shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
                    $css = '<style type="text/css" data-type="vc_shortcodes-custom-css">';
                    $css .= $shortcodes_custom_css;
                    $css .= '</style>';
        
                    echo $css;
                }

                $type = get_field('type', get_the_ID());
                if ($type) {
                    $type = intval($type);
                    if ($type === 2) {
                        // WAVE
                        $header_top    = get_field('header_top', get_the_ID());
                        $header_bottom = get_field('header_bottom', get_the_ID());
                        $background_color = get_field('header_bg_color', get_the_ID());
                        $background_image = get_field('header_bg_img', get_the_ID());
                        $background_size  = get_field('header_bg_size', get_the_ID());
                    }

                    if ($type === 1) {
                        $galleries = get_field('galleries', get_the_ID());
                        $galleries = array_map(function ($gl) { return $gl['url']; }, $galleries);
                    }
                }
                
            
        ?>

                <style type="text/css">
                    #header_<?= $key ?> .section-header-top,
                    #header_<?= $key ?> .section-header-bottom {
                        position: relative;
                    }
                    #header_<?= $key ?> .section-header-top img {
                        position: absolute;
                        top: -80px;
                        height: 80px;
                        bottom: 0;
                        right: 0;
                        z-index: 2
                    }
                    #header_<?= $key ?> .section-header-bottom img {
                        position: absolute;
                        height: 80px;
                        bottom: -80px;
                        right: 0;
                        z-index: 2
                    }
                    
                    #header_<?= $key ?> .section-word {
                        color: white;
                        font-size: 13px;
                        font-weight: 300;
                    }

                    <?php if ($background_color): ?>
                        #header_<?= $key ?> .section-content {
                            background-color: <?= $background_color ?>;
                        }
                    <?php endif; ?>

                    <?php if ($background_image): $background_color = $background_color ? $background_color : "#ffffff"; ?>
                        #header_<?= $key ?> .section-content {
                            background: <?= $background_color ?> url(<?= $background_image['url'] ?>) no-repeat center center;
                            background-size: <?= $background_size ? $background_size : 'cover' ?>;
                        }
                    <?php endif; ?>
                    
                    .section-content {
                        min-height: 300px
                    }
                </style>

                <?php foreach ($galleries as $image):
                    echo '<img class="preloading" src="'.$image.'" style="display: none" />';
                    break;
                endforeach; ?>

                <section id="header_<?= $key ?>" class="section-container">

                    <?php if ($type === 2 && $header_top): ?>
                    <div class="section-header-top">
                        <img src="<?= $header_top['url'] ?>" />
                    </div>
                    <?php endif; ?>

                    <div class="section-content <?php if ( $type === 1): echo 'section-bg-animate pt-4'; endif; ?>"  data-galleries='<?= $type === 1 ? json_encode($galleries) : '' ?>'>
                        <div class="container">
                            <?php echo apply_filters( 'the_content', $results->post->post_content ); ?>
                        </div>
                    </div>

                    <?php if ($type === 2 && $header_bottom): ?>
                    <div class="section-header-bottom">
                    <img src="<?= $header_bottom['url'] ?>" />
                    </div>
                    <?php endif; ?>
                </section>

        <?php 
                $key += $key;
                $background_color = null;
                $background_image = null;
                $background_size  = null;
            endwhile;
        }
        
        ?>

       
<?php
get_footer();