$(document).ready(function() {
    $('#jstree_demo_div').jstree({
        "core" : {
            "data" : {
                "url" : "/tree/list",
                "data" : function (node) {
                    return { "id" : node.id };
                },
            },
            "check_callback" : true,
        },
        "plugins": ["contextmenu"],
    });
});