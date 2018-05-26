@extends('CMS.components.index')
@section('content')
<div class="col-md-4">
    <div class="cf nestable-lists">
        <div class="dd" id="nestable3">
            <ol class="dd-list">
                <li class="dd-item dd3-item" data-id="13">
                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 13</div>
                </li>
                <li class="dd-item dd3-item" data-id="14">
                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 14</div>
                </li>
                <li class="dd-item dd3-item dd-collapsed" data-id="15"><button data-action="collapse" type="button" style="display: none;">Collapse</button><button data-action="expand" type="button" style="display: block;">Expand</button>
                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 15</div>
                    <ol class="dd-list" style="display: none;">
                        <li class="dd-item dd3-item" data-id="16">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 16</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="17">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 17</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="18">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 18</div>
                        </li>
                    </ol>
                </li>
            </ol>
        </div>
    </div>
</div>

@endsection 