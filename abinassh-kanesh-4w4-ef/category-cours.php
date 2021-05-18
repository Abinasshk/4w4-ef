<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */

get_header();
?>
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">Cours</h1>
				<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class= "cours">
			<?php 
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
                convertirTableau($tPropriété);
				get_template_part( 'template-parts/content','cours-article' ); ?>
			<?php endwhile; ?>
				</section>
		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

 function convertirTableau(&$tPropriété)
{
    
	/*
	 
	 
	// 582-1W1 Mise en page Web (75h)
	$sigle = substr($titre, 0, 7);
	$nbHeure = substr($titre,-4,3);
	$titrePartiel =substr($titre,8,-6);
	$session = substr($titre, 4,1);
	// $contenu = get_the_content();
	// $resume = substr($contenu, 0, 200);
	$typeCours = get_field('type_de_cours');
    */

	$tPropriété['titre'] = get_the_title();
	$tPropriété['sigle'] = substr($tPropriété['titre'], 0, 7);
	$tPropriété['nbHeure'] = substr($tPropriété['titre'],-4,3);
	$tPropriété['titrePartiel'] = substr($tPropriété['titre'],8,-6);
	$tPropriété['session'] = get_field('session');
	$tPropriété['typeCours'] = get_field('type_de_cours');
}
