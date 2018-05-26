
    /* Sortable elements */

    $(function() { "use strict";
        $(".sortable-elements").sortable();
    });

    $(function() { "use strict";
        $(".column-sort").sortable({
            connectWith: ".column-sort"
        });
    });

