<template>

    <!--
      'Women' flyout menu, show/hide based on flyout menu state.

      Entering: "transition ease-out duration-200"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition ease-in duration-150"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="absolute top-full inset-x-0 bg-white text-sm text-gray-500" style="display: none;">
        <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
        <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>
        <!-- Fake border when menu is open -->
        <div class="absolute inset-0 top-0 h-px max-w-7xl mx-auto px-8" aria-hidden="true">
            <!-- Open: "bg-gray-200", Closed: "bg-transparent" -->
            <div class="bg-transparent w-full h-px transition-colors ease-out duration-200"></div>
        </div>

        <div class="relative">
            <div class="max-w-7xl mx-auto px-8">
                <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-16">
                    <div class="col-start-2 grid grid-cols-2 gap-x-8">
                        <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-center object-cover">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-gray-900">
                                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                New Arrivals
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                        </div>

                        <div class="group relative text-base sm:text-sm">
                            <div class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                                <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-center object-cover">
                            </div>
                            <a href="#" class="mt-6 block font-medium text-gray-900">
                                <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                Basic Tees
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                        </div>
                    </div>
                    <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                        <div>
                            <p id="Clothing-heading" class="font-medium text-gray-900">
                                Clothing
                            </p>
                            <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Tops
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Dresses
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Pants
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Denim
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Sweaters
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        T-Shirts
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Jackets
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Activewear
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Browse All
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <p id="Accessories-heading" class="font-medium text-gray-900">
                                Accessories
                            </p>
                            <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Watches
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Wallets
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Bags
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Sunglasses
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Hats
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Belts
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <p id="Brands-heading" class="font-medium text-gray-900">
                                Brands
                            </p>
                            <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Full Nelson
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        My Way
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Re-Arranged
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Counterfeit
                                    </a>
                                </li>

                                <li class="flex">
                                    <a href="#" class="hover:text-gray-800">
                                        Significant Other
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
  export default {

  }
</script>
