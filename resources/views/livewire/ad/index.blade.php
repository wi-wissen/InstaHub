<div>
    <div class="card">
        <div class="card-header">{{__('Ads')}}</div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="/ads/create" 
               class="btn btn-success float-right {{ $readonly ? 'disabled' : '' }}" 
               style="color:#fff" 
               {{ $readonly ? 'aria-disabled="true"' : '' }}
            >
               <svg class="plus-line.svg" width="24" height="24" alt="Add" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M30 17H19V6a1 1 0 1 0-2 0v11H6a1 1 0 0 0-1 1a.91.91 0 0 0 1 .94h11V30a1 1 0 1 0 2 0V19h11a1 1 0 0 0 1-1a1 1 0 0 0-1-1" class="clr-i-outline clr-i-outline-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg>
            </a>
           
            <br/>
            <br/>
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr>
                        <th>{{__('Name')}}</th>
                        <th class="fit">{{__('Type')}}</th>
                        <th class="fit">{{__('URL')}}</th>
                        <th class="fit">{{__('Actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ads as $ad)
                    <tr>
                        <td><a href="/ads/{{ $ad->id }}/edit">{{ $ad->name }}</a></td>
                        <td class="fit">{{ $ad->type }}</td>
                        <td class="fit"><code>{{ $ad->url }}</code></td>    
                        <td class="fit">
                            <a href="/ads/{{ $ad->id }}/edit" 
                               class="btn btn-sm btn-secondary {{ $readonly ? 'disabled' : '' }}"
                               {{ $readonly ? 'aria-disabled="true"' : '' }}
                            >
                                <svg class="pencil-line.svg" width="24" height="24" alt="Edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M33.87 8.32L28 2.42a2.07 2.07 0 0 0-2.92 0L4.27 23.2l-1.9 8.2a2.06 2.06 0 0 0 2 2.5a2 2 0 0 0 .43 0l8.29-1.9l20.78-20.76a2.07 2.07 0 0 0 0-2.92M12.09 30.2l-7.77 1.63l1.77-7.62L21.66 8.7l6 6ZM29 13.25l-6-6l3.48-3.46l5.9 6Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                            </a>
                            <button wire:click="deleteAd({{ $ad->id }})" 
                                class="btn btn-sm btn-danger" 
                                style="color:#fff"
                                {{ $readonly ? 'disabled' : '' }}
                            >
                                <svg class="trash-line.svg" width="24" height="24" alt="Delete" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="currentColor" d="M27.14 34H8.86A2.93 2.93 0 0 1 6 31V11.23h2V31a.93.93 0 0 0 .86 1h18.28a.93.93 0 0 0 .86-1V11.23h2V31a2.93 2.93 0 0 1-2.86 3" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M30.78 9H5a1 1 0 0 1 0-2h25.78a1 1 0 0 1 0 2" class="clr-i-outline clr-i-outline-path-2"/><path fill="currentColor" d="M21 13h2v15h-2z" class="clr-i-outline clr-i-outline-path-3"/><path fill="currentColor" d="M13 13h2v15h-2z" class="clr-i-outline clr-i-outline-path-4"/><path fill="currentColor" d="M23 5.86h-1.9V4h-6.2v1.86H13V4a2 2 0 0 1 1.9-2h6.2A2 2 0 0 1 23 4Z" class="clr-i-outline clr-i-outline-path-5"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ads->links() }}
        </div>
    </div>
</div>