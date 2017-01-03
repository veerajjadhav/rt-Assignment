<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
	<label>
		<span class="screen-reader-text"> <?php _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'placeholder' ) ?>" value="<?php get_search_query() ?>" name="s" />
	</label>

</form>

