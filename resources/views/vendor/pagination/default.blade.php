@if ($paginator->hasPages())
  
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())

                <a href="" style="color: teal" style="pointer-events: none; opacity:0.5;">&laquo;</a>
            @else
        
                <a href="{{ $paginator->previousPageUrl() }}" style="color: teal">&laquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
        
                    <a href="" style="pointer-events: none;border: 1px solid #000000">{{ $element }}</a>
                @endif

                
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            
                            <a href="" style="color: black;border: 1px solid #000000" class="active">{{ $page }}</a>
                        @else
                           
                            <a href="{{ $url }}" style="color: teal;border: 1px solid teal">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
               

                <a href="{{ $paginator->nextPageUrl() }}" style="color: teal">&raquo;</a>
            @else
            

                <a href=""  style="pointer-events: none; opacity:0.5; color:teal">&raquo;</a>
            @endif
            </div>

@endif
