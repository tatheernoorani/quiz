<?php 
/**
 * Template part for displaying our_servicess Section
 *
 *@package Grand Academy
 */

    $services_content_type         = grand_academy_get_option( 'services_content_type' );
    $number_of_items               = grand_academy_get_option( 'number_of_items' );

    if( $services_content_type == 'services_page' ) :
        for( $i=1; $i<=$number_of_items; $i++ ) :
            $our_services_pages[] = grand_academy_get_option( 'our_services_page_'.$i );
        endfor;  
    elseif( $services_content_type == 'services_post' ) :
        for( $i=1; $i<=$number_of_items; $i++ ) :
            $our_services_posts[] = grand_academy_get_option( 'our_services_post_'.$i );
        endfor;
    endif;
    ?>
    
    <?php if( $services_content_type == 'services_page' ) : ?>
        <div class="section-content clear col-3">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $our_services_pages ),
                'post__in'      => $our_services_pages,
                'orderby'       =>'post__in',
            );  

            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $our_services_icons[$j] = grand_academy_get_option( 'our_services_icon_'.$j ); ?>        
                
                <article>
                    <div class="service-item-wrapper">
                        <?php if( !empty( $our_services_icons[$j] ) ) : ?>
                            <div class="icon-container">
                                <a href="<?php the_permalink();?>">
                                    <span class="petal"></span>
                                    <span class="petal"></span>
                                    <span class="petal"></span>
                                    <span class="petal"></span>
                                    <span class="petal"></span>
                                    <i class="<?php echo esc_attr( $our_services_icons[$j] )?>"></i>
                                </a>
                            </div><!-- .icon-container -->
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <div class="entry-content">
                            <?php
                                $excerpt = grand_academy_the_excerpt( 20 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div><!-- .service-item-wrapper -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div><!-- .section-content -->

    <?php else: ?>
        <div class="section-content clear col-3">
            <?php $args = array (
                'post_type'     => 'post',
                'post_per_page' => count( $our_services_posts ),
                'post__in'      => $our_services_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );   
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $our_services_icons[$j] = grand_academy_get_option( 'our_services_icon_'.$j ); ?>        
                
                <article>
                    <div class="service-item-wrapper">
                        <?php if( !empty( $our_services_icons[$j] ) ) : ?>
                            <div class="icon-container">
                                <a href="<?php the_permalink();?>">
                                    <span class="petal"></span>
                                    <span class="petal"></span>
                                    <span class="petal"></span>
                                    <span class="petal"></span>
                                    <span class="petal"></span>
                                    <i class="<?php echo esc_attr( $our_services_icons[$j] )?>"></i>
                                </a>
                            </div><!-- .icon-container -->
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>

                        <div class="entry-content">
                            <?php
                                $excerpt = grand_academy_the_excerpt( 20 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div><!-- .service-item-wrapper -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div><!-- .section-content -->
    <?php endif;