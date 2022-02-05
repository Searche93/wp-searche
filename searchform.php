<form role="search"
      method="get"
      class="search-form col-12 pos-relative"
      action="<?=home_url( '/' ); ?>"
>

    <input class="search-field col-12 p-sm fs-large"
           type="search"
           id="search-form"
           placeholder="<?=esc_attr_x( 'Zoeken...', 'placeholder' ) ?>"
           value="<?=get_search_query() ?>" name="s"
           title="<?=esc_attr_x( 'Search for:', 'label' ) ?>"
    />

    <button id="search-button" type="submit" class="p-sm pos-absolute right-0">
        <i class="fa fa-search"></i>
    </button>
</form>