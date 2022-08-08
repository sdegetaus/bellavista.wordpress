<header id="header" class="sticky top-0 bg-white">
  <div class="flex justify-between items-center px-4 py-6 sm:px-6 md:justify-start md:space-x-10">
    <div>
      <a href="<?php echo get_site_url(); ?>" class="flex">
        <span class="sr-only"><?php echo get_bloginfo('name'); ?></span>
        <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
      </a>
    </div>
    <div class="-mr-2 -my-2 md:hidden">
      <button type="button" class="burger-toggle bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
        <span class="sr-only"><?php _e('Open menu', 'bellavista'); ?></span>
        <!-- Heroicon name: outline/menu -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
      <nav class="flex space-x-10">
        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Estacionamiento</a>
        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Noticias</a>
      </nav>
      <div class="flex items-center md:ml-12">
        <a href="#" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900"><?php _e('Request Access', 'bellavista'); ?></a>
        <a href="<?php echo wp_login_url(); ?>" class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700"><?php _e('Login', 'bellavista'); ?></a>
      </div>
    </div>
  </div>

  <div id="mobile-menu" class="hidden absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
      <div class="pt-5 pb-6 px-5">
        <div class="flex items-center justify-between">
          <div>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
          </div>
          <div class="-mr-2">
            <button type="button" class="burger-toggle  bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
              <span class="sr-only"><?php _e('Close menu', 'bellavista'); ?></span>
              <!-- Heroicon name: outline/x -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
        <div class="mt-6">
          <nav class="grid gap-6">

            <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
              <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white">
                <!-- Heroicon name: outline/chart-bar -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </div>
              <div class="ml-4 text-base font-medium text-gray-900">Analytics</div>
            </a>

          </nav>
        </div>
      </div>
      <div class="py-6 px-5">
        <div>
          <a href="<?php echo wp_login_url(); ?>" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700"><?php _e('Login', 'bellavista'); ?></a>
          <p class="mt-5 text-center text-base font-medium leading-none">
            <a href="#" class="text-indigo-600 hover:text-indigo-500"><?php _e('Request Access', 'bellavista'); ?></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</header>