<template>
    <div>
        <div v-if="editable">
            <textarea name="content" class="form-control rawtext" v-model="rawtext" @input="typing">
            </textarea>
        </div>
        <div class="markdown-body previw" v-html="preview"></div>
    </div>
</template>

<style>
    @import url('https://cdn.jsdelivr.net/npm/github-markdown-css@3.0.1/github-markdown.min.css');
    textarea.rawtext {
        height: 50vh;
    }
    div.preview {
        margin-top: 10px;
    }
</style>

<script>
    import marked from "marked";
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            mdtext: String,
            editable: Boolean
        },
        data() {
            return {
                rawtext: this.mdtext
            }
        },
        methods: {
            typing: function(el) {
              this.rawtext = el.target.value;
            },
        },
        computed: {
            preview: function() {
                return marked(this.rawtext, { sanitize: true })
            }
        }
    }
</script>
