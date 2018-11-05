(function($) {
    //Only execute if tinymce and tinyMCE_object are declared (ie tinymce is running)
    if (typeof window.tinymce !== "undefined" && typeof window.tinyMCE_object !== "undefined") {
        var tinymce = window.tinymce,
            tinyMCE_object = window.tinyMCE_object;

        //Configuring the 'Add footnote' button actions
        tinymce.PluginManager.add("btn_footnote", function( editor ) {
            editor.addButton( "btn_footnote", {
                text: "",
                icon: "insertdatetime",
                image: tinyMCE_object.plugin_dir + "/assets/img/icon.png",
                onclick: function() {
                    editor.windowManager.open( {
                        title: "Footnote",
                        body: [
                            {
                                type   : "textbox",
                                name   : "num",
                                label  : "Reference",
                                layout: "fit",
                                value  : ""
                            },
                            {
                                type   : "textbox",
                                name   : "textbox",
                                multiline : true,
                                layout: "fit",
                                minWidth: 260,
                                minHeight: 160,
                                value  : ""
                            }
                        ],
                        onsubmit: function( e ) {
                            //Building footnote with shortcode.
                            editor.insertContent( "<span class=\"footnote-container\" data-title=\"" + e.data.num + "\" data-content=\"" + e.data.textbox + "\" id=\"fn" + Math.floor((Math.random() * 1000000) + 1) + "\"><i>[footnote title=\"" + e.data.num + "\"]" + e.data.textbox + "[/footnote]</i></span>");
                        }
                    });
                }
            });
        });
        $(document).on("tinymce-editor-init", function(event, editor) {
            editor.on("click", function(event) {
                var e = event.target;
                //Detect click on the footnote inside the editor
                if(e.className == "footnote-container"){
                    //Prompt to edit footnote content
                    editor.windowManager.open( {
                        title: "Footnote",
                        body: [
                            {
                                type   : "textbox",
                                name   : "num",
                                label  : "Reference",
                                layout: "fit",
                                value  : e.dataset.title
                            },
                            {
                                type   : "textbox",
                                name   : "textbox",
                                multiline : true,
                                layout: "fit",
                                minWidth: 260,
                                minHeight: 160,
                                value  : e.dataset.content
                            },
                            //Add option to delete footenot
                            {
                                type   : "button",
                                name   : "button",
                                text   : "Delete footnote",
                                onclick: function() {
                                    var a = editor.selection.getNode();
                                    var r = confirm("Delete footnote " + e.dataset.title);
                                    if (r == true) {
                                        a.parentNode.removeChild(a);
                                        editor.windowManager.close();
                                    }
                                }
                            },
                        ],
                        onsubmit: function( e ) {
                            //Get the current footnote node (<span>)
                            var a = editor.selection.getNode();

                            //Update values
                            a.dataset.title = e.data.num;
                            a.dataset.content = e.data.textbox;
                            a.innerHTML = "<i>[footnote title=\"" + e.data.num + "\"]" + e.data.textbox + "[/footnote]</i>";
                        }
                    });
                }
            });
        });
    } else {
        // eslint-disable-next-line no-console
        console.error("tinymce not found");
    }
})( window.jQuery );