<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Welcome {{ auth()->user()->name }}!</h1>
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0">{{ $usersCount }}</span>
                                <p class="small text-muted mb-0">Users</p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-users text-primary mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0">{{ $postsCount }}</span>
                                <p class="small text-muted mb-0">Posts</p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-file-text text-success mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0">{{ $rolesCount }}</span>
                                <p class="small text-muted mb-0">Roles</p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-user-check text-warning mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0">{{ $categoriesCount }}</span>
                                <p class="small text-muted mb-0">Categories</p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-folder text-danger mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <span class="h2 mb-0">{{ $permissionsCount }}</span>
                                <p class="small text-muted mb-0">Permissions</p>
                            </div>
                            <div class="col-auto">
                                <span class="fe fe-32 fe-key text-info mb-0"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mt-4 mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fe fe-award mr-2"></i>
                    Most Popular Category
                </h5>
            </div>

            <div class="card-body">
                @if($mostPopularCategory)
                <h4>{{ $mostPopularCategory->name }}</h4>
                <p class="text-muted mb-0">
                    {{ $mostPopularCategory->posts_count }}
                    {{ Str::plural('Post', $mostPopularCategory->posts_count) }}
                </p>
                @else
                <p class="text-muted mb-0">No categories available.</p>
                @endif
            </div>
        </div>
        <div class="row mt-4">

            <!-- Latest Users -->
            <div class="col-lg-6 mb-4 mt-4">
                <div class="card shadow h-100">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fe fe-users mr-2"></i>
                            Latest Users
                        </h5>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($latestUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        No users found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


            <!-- Latest Posts -->
            <div class="col-lg-6 mb-4 mt-4 ">
                <div class="card shadow h-100">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fe fe-file-text mr-2"></i>
                            Latest Posts
                        </h5>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($latestPosts as $post)
                                <tr>
                                    <td>{{ Str::limit($post->title, 30) }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->created_at->format('d M Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">
                                        No posts found.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

    </x-slot>


</x-app-layout>