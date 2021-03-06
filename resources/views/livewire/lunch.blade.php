<div class="row">
{{--    <form method="post" wire:submit.prevent="prevent" >--}}

    <form method="post" action="#" wire:submit="submit" >
{{--    <form method="post" action="{{ route('lunch.store') }}" >--}}
        @csrf
{{--    <form method="post" action="{{ route('lunch.store') }}" >--}}

        <button type="button" class="btn btn-success float-right" onclick="openSave()">開啟儲值</button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">姓名</th>
                    <th scope="col">目前餘額</th>
                    <th scope="col">扣款</th>
                    <th scope="col">儲值</th>
                    <th scope="col">備註</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td class="{{ $user->deposit >= 0 ?'bg-success':'bg-danger'}}">{{ $user->deposit }}</td>
                    <td>
                        <input class="form-control user-cost" type="number" value="0" name="user_cost[]">
                        <input type="hidden" value="{{ $user->id }}" name="user_id[]">
                    </td>
                    <td>
                        <input class="form-control user-save" type="number" value="0" name="user_save[]" data-user_id="20" disabled="">
                    </td>
                    <td>
                        <input class="form-control user-remark" type="text" name="user_remark[]" data-user_id="20" placeholder="此處備註">
                    </td>
                </tr>
            @empty
                <p>沒有資料</p>

            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5">
{{--                    <button  class="btn btn-dark float-right">儲存</button>--}}
                    <button type="button" class="btn btn-dark float-right" wire:click="submit">儲存</button>

{{--                    <button class="btn btn-dark float-right" wire:click="$emitTo('lunch', 'submit')">儲存</button>--}}

                </td>
            </tr>
            </tfoot>
        </table>
    </form>

</div>
<livewire:scripts />
