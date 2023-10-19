<div class="my-modal" id="my-modal" onclick="modal_is_off()">
    <div class="my-modal-cont" onclick="stop_ppg(event)">
        <div class="my-modal-cont-text">
            <h4>You sure you want to delete the post?</h4>
        </div>
        <div class="my-modal-cont-btns">
            <form id="my-form" action="/posts/" method="POST">
                @csrf
                @method('DELETE')
                <x-ui.button>delete</x-ui.button>
            </form>

            <button type="button" onclick="modal_is_off()" class="btn original-btn">Cancel</button>
        </div>
    </div>
</div>
