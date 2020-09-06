<template>
    <div>
        <div class="row" v-if="editable">
            <div class="col-sm-6">
                <textarea id="markdownText" name="content" class="form-control" v-model="markdownText">
                </textarea>
            </div>
            <div class="markdown-body mt-2 col-sm-6" v-html="preview"></div>
        </div>
        <div v-if="!editable">
            <div class="markdown-body mt-2" v-html="preview"></div>
        </div>
    </div>
</template>

<style>
    @import url('https://cdn.jsdelivr.net/npm/github-markdown-css@3.0.1/github-markdown.min.css');
    @import url('https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.2/build/styles/github.min.css');

    #markdownText {
        height: 82vh;
    }
</style>

<script>
    import marked from "marked"
    import hljs from 'highlightjs'

    export default {
        props: {
            rawText: String,
            editable: Boolean
        },
        data() {
            return {
                markdownText: this.rawText
            }
        },
        created() {
            marked.setOptions({
                highlight: function(code, lang) {
                    return hljs.highlightAuto(code, [lang]).value;
                }
            })
        },
        computed: {
            preview: function() {
                return marked(this.markdownText, { sanitize: true })
            }
        }
    }
</script>
