<template>
    <div class="row">
        <div v-if="editable" class="col">
            <textarea id="mdtext" name="content" class="form-control" v-model="markdownText">
            </textarea>
        </div>
        <div id="preview" class="markdown-body col" v-html="preview"></div>
    </div>
</template>

<style>
    @import url('https://cdn.jsdelivr.net/npm/github-markdown-css@3.0.1/github-markdown.min.css');
    @import url('https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.2/build/styles/github.min.css');

    #mdtext {
        height: 80vh;
    }
    #preview {
        height: 80vh;
        overflow-y: scroll;
    }
</style>

<script>
    import marked from "marked";
    import hljs from 'highlightjs';

    export default {
        props: {
            markdownText: String,
            editable: Boolean
        },
        created() {
            marked.setOptions({
                highlight: function(code, lang) {
                    return hljs.highlightAuto(code, [lang]).value;
                }
            });
        },
        computed: {
            preview: function() {
                return marked(this.markdownText, { sanitize: true })
            }
        }
    }
</script>
