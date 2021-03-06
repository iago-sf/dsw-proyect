<footer class="row justify-content-evenly m-0 p-0 mt-5 align-items-center">
    <div class="col col-md-3 text-center p-3">
        <h6>{{ __('Created by:')}}</h6>
        <h6>Iago Senín Fernández</h6>
        <h6>2º DAW - DSW</h6>
    </div>
    <div class="col col-md-4 text-center p-3">
        @if(!is_null(Auth::user()) && Auth::user()->role != 'mod')
        <button class="btn btn-outline-dark w-25 mb-2" data-bs-toggle="modal" data-bs-target="#updateModal">{{ __('Become a mod') }}</button>
        @else
        <div><a href="https://github.com/iago-sf/dsw-proyect" class="text-dark" target="_blank"><i class="bi bi-github"></i></a></div>
        @endif
    </div>
</footer>

@if(!is_null(Auth::user()) && Auth::user()->role != 'mod')
{{ Alert::modal(
    'update',
    'If you click accept you will become a moderator',
    'By doing so you will have a great responsability and those priviledges can be rovoked at any time.',
    Route('User_update', Auth::id())
) }}
@endif

<script>
    /**
     * This event sets the footer as fixed bottom whenever the page has not enough content to 
     * set it at the total bottom of the page.
     */
    window.addEventListener('load', ()=>{
    if(window.innerHeight >= document.getElementsByTagName('body')[0].offsetHeight){
        document.getElementsByTagName('footer')[0].style.position = 'fixed';
        document.getElementsByTagName('footer')[0].style.bottom = 0;
        document.getElementsByTagName('footer')[0].style.width = '100%';
    }
    });
</script>