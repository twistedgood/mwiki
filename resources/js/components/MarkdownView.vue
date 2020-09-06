<template>
    <div>
        <div class="row" v-if="editable">
            <div class="col-sm-6">
                <textarea id="markdownText" name="content" class="form-control" v-model="markdownText">
                </textarea>
            </div>
            <div class="markdown-body mt-2 mb-5 col-sm-6" v-html="preview"></div>
        </div>
        <div v-if="!editable">
            <div>
                <ul id="toc">
                    <li v-for="item in toc" :key="item.anchor" :class="'ml-' + item.level * 2">
                        <a :href="'#' + item.anchor">{{ item.escapedText }}</a>
                    </li>
                </ul>
            </div>
            <div class="markdown-body mt-2 mb-5" v-html="preview"></div>
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
                markdownText: this.rawText,
                renderer: null,
                toc: [],
                anchor: [0, 0, 0]
            }
        },
        methods: {
            getAnchor: function(level) {
                this.anchor[level - 1] += 1
                for (var i = level; i < this.anchor.length; i++) {
                    this.anchor[i] = 0
                }
                return (
                    'index_' + this.anchor[0] + '-' + this.anchor[1] + '-' + this.anchor[2]
                )
            }
        },
        created() {
            marked.setOptions({
                highlight: function(code, lang) {
                    return hljs.highlightAuto(code, [lang]).value;
                }
            })

            this.renderer = new marked.Renderer()
            let vm = this
            this.renderer.heading = function(text, level) {
                let escapedText = text.replace(/<("[^"]*"|'[^']*'|[^'">])*>/g, '')
                if (level < 4) {
                    let anchor = vm.getAnchor(level)
                    vm.toc.push({ level, anchor, escapedText })
                    return '<h' + level + ' id="' + anchor + '">' + text + '</h' + level + '>'
                } else {
                    return '<h' + level + '>' + text + '</h' + level + '>'
                }
            }
        },
        computed: {
            preview: function() {
                return marked(this.markdownText, { sanitize: true, renderer: this.renderer })
            }
        }
    }
</script>
