<div class="search-form-cs">
  <form form="" id="buscador-destinos" method="get" class="section-hero__searcher" autocomplete="off"
    action="<?php echo esc_url(home_url('/')); ?>" data-gtm-form-interact-id="0">
    <div class="section-hero__searcher-wrapper autocomplete">
      <input id="s" value="" type="text" name="s" class="section-hero__searcher-input aa-input search-form-cs-input hidden-mobile remove-mobile-js"
        autocomplete="off" spellcheck="false" role="combobox"
        placeholder="Search Data Plans for 200+ Countries & Regions" aria-autocomplete="list" aria-expanded="false"
        aria-owns="algolia-autocomplete-listbox-6" dir="auto" style="" class="input-" />
        <input id="s" value="" type="text" name="s" class="section-hero__searcher-input aa-input search-form-cs-input hidden-tablet-pc remove-tablet-pc-js"
        autocomplete="off" spellcheck="false" role="combobox"
        placeholder="search" aria-autocomplete="list" aria-expanded="false"
        aria-owns="algolia-autocomplete-listbox-6" dir="auto" style="" class="input-" />
        <div class="hidden-tablet-pc icon-search-destination">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M17.5 17.5L13.875 13.875" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
      <button class="section-hero__searcher-btn hidden-mobile" tyoe="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
          <path d="M9.625 16.625C13.491 16.625 16.625 13.491 16.625 9.625C16.625 5.75901 13.491 2.625 9.625 2.625C5.75901 2.625 2.625 5.75901 2.625 9.625C2.625 13.491 5.75901 16.625 9.625 16.625Z" stroke="#7F3DFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M18.375 18.3751L14.5687 14.5688" stroke="#7F3DFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
      <input type="hidden" name="type" value="product" />
    </div>
    <div class="find-sim"></div>
  </form>
</div>
<div class="flex  filter-searh-destination">
  <div id="destinations-ranges-container">
    <a class="destination-range-button "
      href="<?php echo get_bloginfo('url'); ?>/?s=&type=product&first_letter=A&amp;last_letter=B"> A - B</a> <a
      class="destination-range-button "
      href="<?php echo get_bloginfo('url'); ?>/?s=&type=product&first_letter=C&amp;last_letter=E"> C - E</a> <a
      class="destination-range-button "
      href="<?php echo get_bloginfo('url'); ?>/?s=&type=product&first_letter=G&amp;last_letter=I"> G - I</a> <a
      class="destination-range-button "
      href="<?php echo get_bloginfo('url'); ?>/?s=&type=product&first_letter=J&amp;last_letter=L"> J - L</a> <a
      class="destination-range-button "
      href="<?php echo get_bloginfo('url'); ?>/?s=&type=product&first_letter=M&amp;last_letter=N"> M - N</a> <a
      class="destination-range-button "
      href="<?php echo get_bloginfo('url'); ?>/?s=&type=product&first_letter=P&amp;last_letter=R"> P - R</a> <a
      class="destination-range-button "
      href="<?php echo get_bloginfo('url'); ?>/?s=&type=product&first_letter=S&amp;last_letter=S"> S - S</a> <a
      class="destination-range-button "
      href="<?php echo get_bloginfo('url'); ?>/?s=&type=product&first_letter=T&amp;last_letter=Z"> T - Z</a>
  </div>
  <div class="destination-dropdow">
    <select id="esim-selection">
      <option value="all">All Destinations</option>
      <option value="popular">Popular Destinations</option>
      <option value="local">Local eSIMs</option>
      <option value="regional">Regional eSIMs</option>
      <option value="global">Global eSIMs</option>
    </select>
  </div>
</div>