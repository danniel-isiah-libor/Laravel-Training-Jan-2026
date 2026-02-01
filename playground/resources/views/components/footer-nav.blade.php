<footer
    class="py-4 px-8 w-full flex self-end justify-between items-center sticky bottom-0 md:hidden bg-black border-t border-t-gray-800">
    <x-navigation.nav-menu icon="home-icon" label="Home" :route="route('home')" :isActive="request()->routeIs('home')" />
    <x-navigation.nav-menu icon="bell-icon" label="Notification" route="#" :isActive="request()->routeIs('user.notification')" />
    <x-navigation.nav-menu icon="profile-icon" label="Profile" route="#" :isActive="request()->routeIs('user.profile.show')" />

    <form action="{{ route('users.logout') }}" method="post">
        <button type="submit" class="flex gap-2 text-sm items-center font-semibold hover:text-sky-500">
            <div class="w-6">
                @include("icons.logout-icon")
            </div>
        </button>
    </form>
</footer>
