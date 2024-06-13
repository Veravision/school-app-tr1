<!-- START CONTAINER FLUID -->
<div class=" container-fluid   container-fixed-lg">
    <!-- START card -->
    <div class="card card-transparent">
        <div class="card-header ">
            <div class="card-title">All Available Posts
            </div>
            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" name=""  value="" class="form-control" style="text-align:center" placeholder="Search here">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <table class="table table-hover demo-table-dynamic table-responsive-block"
                id="tableWithDynamicRows">
                <thead>
                    <tr>
                        <th style="width:5%">S/N</th>
                        <th class="text-primary">Title</th>
                        <th>Author</th>
                        <th>Summary</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getAllPosts as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->author }}</td>
                            <td>Str::of({{ $posts->summary }})->limit(50)</td>
                            <td>{{ $post->published == 1 ? 'Published' : 'Draft' }}</td>
                            <td>{{ $post->published == 1 ? $post->published_at : $post->updated_at+'<br>'+'Last Edited' }}</td>
                            <td>...</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END card -->
</div>
<!-- END CONTAINER FLUID -->