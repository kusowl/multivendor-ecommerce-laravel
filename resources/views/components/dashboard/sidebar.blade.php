<aside class="w-72 space-y-5 max-w-52 col-span-2 bg-white p-4 border !border-gray-200">
    <div class="logo text-xl font-black text-blue-500">
        E-Commu
    </div>
    <div class="links">
        <ul class="grid gap-4 text-sm">
            <x-dashboard.sidebar-item route="dashboard" icon="home">Home</x-dashboard.sidebar-item>
            <x-dashboard.sidebar-item route="dashboard.category" icon="inbox-stack">View all Categories
            </x-dashboard.sidebar-item>
            <x-dashboard.sidebar-item route="dashboard.category.create" icon="inbox-stack">
                Add Category
            </x-dashboard.sidebar-item>
            <x-dashboard.sidebar-item route="dashboard.sub-category.create" icon="inbox-stack">Sub Categories
            </x-dashboard.sidebar-item>
            <x-dashboard.sidebar-item route="dashboard.sub-category" icon="inbox-stack">View all Sub Categories
            </x-dashboard.sidebar-item>
            <x-dashboard.sidebar-item route="dashboard.product.create" icon="cube">Add Product
            </x-dashboard.sidebar-item>
        </ul>
    </div>
</aside>
