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
        "plugins": ["contextmenu","types"],
        'types' : {
            "default": {"icon": "jstree-icon jstree-folder"},
            "1": {"icon": "jstree-icon jstree-file"}
        },
        "contextmenu": {
            "items": function ($node) {

                console.log($node);
                return {
                    "create_folder" : {
                        "separator_before" : false,
                        "separator_after"  : true,
                        "_disabled"        : ($node.type === 1), //(this.check("create_node", data.reference, {}, "last")),
                        "label"            : "Создать папку",
                        "title"            : "Создать папку в разделе",
                        "action"           : function (data) {
                            var inst = $.jstree.reference(data.reference),
                                obj = inst.get_node(data.reference);
                            inst.create_node(obj, {}, "last", function (new_node) {
                                try {
                                    inst.edit(new_node, 'Новая папка');
                                    //console.log(obj);
                                    $.get('/tree/create',{'parent_id': obj.id})
                                        .done(function (d) {
                                            //console.log(d);
                                        })
                                        .fail(function () {
                                            //console.log('fail');
                                            //data.instance.refresh();
                                        });
                                } catch (ex) {
                                    setTimeout(function () { inst.edit(new_node); },0);
                                }
                            });
                        }
                    },
                    "create_file" : {
                        "separator_before" : false,
                        "separator_after"  : true,
                        "_disabled"        : ($node.type === "default"), //(this.check("create_node", data.reference, {}, "last")),
                        "label"            : "Создать фаил",
                        "title"            : "Создать фаил в разделе",
                        "action"           : function (data) {
                            var inst = $.jstree.reference(data.reference),
                                obj = inst.get_node(data.reference);
                            inst.create_node(obj, {}, "last", function (new_node) {
                                try {
                                    inst.edit(new_node, 'Новая папка');
                                    //console.log(obj);
                                    $.get('/tree/create',{'parent_id': obj.id})
                                        .done(function (d) {
                                            //console.log(d);
                                        })
                                        .fail(function () {
                                            //console.log('fail');
                                            //data.instance.refresh();
                                        });
                                } catch (ex) {
                                    setTimeout(function () { inst.edit(new_node); },0);
                                }
                            });
                        }
                    },
                    "rename" : {
                        "separator_before"	: false,
                        "separator_after"	: false,
                        "_disabled"			: false, //(this.check("rename_node", data.reference, this.get_parent(data.reference), "")),
                        "label"				: "Переименовать",
                        /*!
                        "shortcut"			: 113,
                        "shortcut_label"	: 'F2',
                        "icon"				: "glyphicon glyphicon-leaf",
                        */
                        "action"			: function (data) {
                            var inst = $.jstree.reference(data.reference),
                                obj = inst.get_node(data.reference);
                            inst.edit(obj);
                        }
                    },
                    "remove" : {
                        "separator_before"	: false,
                        "icon"				: false,
                        "separator_after"	: false,
                        "_disabled"			: false, //(this.check("delete_node", data.reference, this.get_parent(data.reference), "")),
                        "label"				: "Удалить",
                        "action"			: function (data) {
                            var inst = $.jstree.reference(data.reference),
                                obj = inst.get_node(data.reference);
                            if(inst.is_selected(obj)) {
                                inst.delete_node(inst.get_selected());
                            }
                            else {
                                inst.delete_node(obj);
                            }
                        }
                    },
                    "ccp" : {
                        "separator_before"	: true,
                        "icon"				: false,
                        "separator_after"	: false,
                        "label"				: "Редактировать",
                        "action"			: false,
                        "submenu" : {
                            "cut" : {
                                "separator_before"	: false,
                                "separator_after"	: false,
                                "label"				: "Вырезать",
                                "action"			: function (data) {
                                    var inst = $.jstree.reference(data.reference),
                                        obj = inst.get_node(data.reference);
                                    if(inst.is_selected(obj)) {
                                        inst.cut(inst.get_top_selected());
                                    }
                                    else {
                                        inst.cut(obj);
                                    }
                                }
                            },
                            "copy" : {
                                "separator_before"	: false,
                                "icon"				: false,
                                "separator_after"	: false,
                                "label"				: "Копировать",
                                "action"			: function (data) {
                                    var inst = $.jstree.reference(data.reference),
                                        obj = inst.get_node(data.reference);
                                    if(inst.is_selected(obj)) {
                                        inst.copy(inst.get_top_selected());
                                    }
                                    else {
                                        inst.copy(obj);
                                    }
                                }
                            },
                            "paste" : {
                                "separator_before"	: false,
                                "icon"				: false,
                                "_disabled"			: function (data) {
                                    return !$.jstree.reference(data.reference).can_paste();
                                },
                                "separator_after"	: false,
                                "label"				: "Вставить",
                                "action"			: function (data) {
                                    var inst = $.jstree.reference(data.reference),
                                        obj = inst.get_node(data.reference);
                                    inst.paste(obj);
                                }
                            }
                        }
                    }
                };
            }
        }
    });
    $('#jstree_demo_div').on('ready.jstree', function() {
        $('#jstree_demo_div').jstree("open_all");
    });
});