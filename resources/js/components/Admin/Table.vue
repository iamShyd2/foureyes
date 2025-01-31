<template>
  <div class="">
    <div class="max-w-6xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 flex justify-between">
      <h2 class=" text-lg leading-6 font-medium text-gray-900">{{ title }}</h2>
      <div v-if="canAdd">
        <router-link :to="newPath">
          Add New {{ title }}
        </router-link>
      </div>
    </div>

    <!-- Activity list (smallest breakpoint only) -->
    <div class="shadow sm:hidden">
      <ul role="list" class="mt-2 divide-y divide-gray-200 overflow-hidden shadow sm:hidden">
        <li>
          <a href="#" class="block px-4 py-4 bg-white hover:bg-gray-50">
            <span class="flex items-center space-x-4">
              <span class="flex-1 flex space-x-2 truncate">
                <!-- Heroicon name: solid/cash -->
                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                <span class="flex flex-col text-gray-500 text-sm truncate">
                  <span class="truncate">Payment to Molly Sanders</span>
                  <span><span class="text-gray-900 font-medium">$20,000</span> USD</span>
                  <time datetime="2020-07-11">July 11, 2020</time>
                </span>
              </span>
              <!-- Heroicon name: solid/chevron-right -->
              <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </span>
          </a>
        </li>

        <!-- More transactions... -->
      </ul>

      <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200" aria-label="Pagination">
        <div class="flex-1 flex justify-between">
          <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Previous </a>
          <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500"> Next </a>
        </div>
      </nav>
    </div>

    <!-- Activity table (small breakpoint and up) -->
    <div class="hidden sm:block">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col mt-2">
          <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <template v-for="(header, i) in headers">
                    <th :key="i" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ renderHeader(header) }}</th>
                  </template>
                  <template v-if="hasActions">
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                  </template>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <template v-for="(row, i) in rows">
                  <tr :key="i">
                    <template v-for="(header, j) in headers">
                      <td :key="j" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <component :is="render(row, header)" :row="row" :header="header" />
                      </td>
                    </template>
                    <template v-if="hasActions">
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <t-dropdown>
                          <div
                            slot="trigger"
                            slot-scope="{
                              mousedownHandler,
                              focusHandler,
                              blurHandler,
                              keydownHandler,
                              isShown
                            }"
                          >
                            <button
                              @mousedown="mousedownHandler"
                              @focus="focusHandler"
                              @blur="blurHandler"
                              @keydown="keydownHandler"
                              type="button" class="max-w-xs bg-white rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50" id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                            >
                              <i class="fa fa-ellipsis-v"></i>
                            </button>
                          </div>

                          <!--
                            Dropdown menu, show/hide based on menu state.

                            Entering: "transition ease-out duration-100"
                              From: "transform opacity-0 scale-95"
                              To: "transform opacity-100 scale-100"
                            Leaving: "transition ease-in duration-75"
                              From: "transform opacity-100 scale-100"
                              To: "transform opacity-0 scale-95"
                          -->
                          <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <router-link :to="`/admin/${resource}/${row.id}/edit`" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Edit</router-link>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1">Delete</a>
                          </div>
                        </t-dropdown>
                      </td>
                    </template>
                  </tr>
                </template>

                <!-- More transactions... -->
              </tbody>
            </table>
            <!-- Pagination -->
            <nav class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6" aria-label="Pagination">
              <div class="hidden sm:block">
                <p class="text-sm text-gray-700">
                  Showing
                  <span class="font-medium">1</span>
                  to
                  <span class="font-medium">10</span>
                  of
                  <span class="font-medium">20</span>
                  results
                </p>
              </div>
              <div class="flex-1 flex justify-between sm:justify-end">
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script type="text/javascript">
  import Vue from "vue";

  Vue.component("TD", {
    props: ['row', 'header'],
    template: '<template>{{row[header]}}</template>'
  })
  export default {
    props: [
      "headers",
      "rows",
      "title",
      "canAdd",
      "newPath",
      "hasActions",
      "resource",
    ],
    methods: {
      render(row, header){
        if (typeof header != "string"){
          if(header.render){
            return header.render;
          }
        }
        return "TD";
      },
      renderHeader(header){
        if (typeof header != "string"){
          return header.key;
        }
        return header;
      },
    }
  }
</script>
