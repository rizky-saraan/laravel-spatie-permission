
<aside class="w-64" aria-label="Sidebar">
   <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
      <ul class="space-y-2">        
        @foreach (getMenus() as $menu)
            @can('read '.$menu->url)
                <li>
                    <a href="{{ url($menu->url) }}" class="{{ (request()->is($menu->url)) ? 'text-grey-500 bg-blue-300' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} flex items-center p-2 text-base font-normal rounded-lg ">
                        <ion-icon name="{{ $menu->icon }}"></ion-icon>
                        <span class="ml-3">{{ $menu->name }}</span> 
                    </a>                  
                </li>
            @endcan
        @endforeach 
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li>
                <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('logout') }}" class="'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 items-center p-2 text-base font-normal rounded-lg ">
                    <ion-icon name="exit-outline"></ion-icon>
                    <span class="ml-3">Keluar</span> 
                </a>                  
            </li>
        </form>
      </ul>
   </div>
</aside>
