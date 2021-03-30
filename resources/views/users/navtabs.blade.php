<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ユーザ詳細タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            TimeLine
            <span class="badge badge-secondary">{{ $user->microposts_count }}</span>
        </a>
    </li>
    {{-- フォロー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            Followings
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a>
    </li>
    {{-- フォロワー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            Followers
            <span class="badge badge-secondary">{{ $user->followers_count }}</span>
        </a>
    </li>
</ul>