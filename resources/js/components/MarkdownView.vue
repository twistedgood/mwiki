<template>
    <div class="row">
        <div v-if="editable" class="col">
            <textarea id="rawtext" name="content" class="form-control" v-model="rawtext" @input="typing">
            </textarea>
        </div>
        <div id="preview" class="markdown-body col" v-html="preview"></div>
    </div>
</template>

<style>
    @import url('https://cdn.jsdelivr.net/npm/github-markdown-css@3.0.1/github-markdown.min.css');
    #rawtext {
        height: 80vh;
    }
    #preview {
        height: 80vh;
        overflow-y: scroll;
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
