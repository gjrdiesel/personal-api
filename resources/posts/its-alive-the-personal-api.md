---
title: It's alive! (the personal api)
published: false
description:
tags:
//cover_image:
---

Ok, so the fundementials are there. My personal website now has it's own personal api. I mean, you're seeing it now.
In action just by reading this post, but you can also access it via [/graphql](/graphql) or [/graphql-playground](/graphql-playground).

It pulls posts from dev.to if I wanna write something there for more exposure (maybe?), thinking I might make it so it automatically
publishes to dev.to from my personal too (I setup canonicals either way). But it's definitely gonna at least pull from dev.to.

Again, why? I really just wanted a reason to have my own graphql endpoint, and I needed to improve my own personal site so,
win-win I suppose.

Now the real question is what else do I toss on here for functionality? Projects? Github repos? My own image hosting?

Either way, I think the next step is going to be hosting. And I'm already thinking I'm going to toss this API on an already
existing digitalocean droplet I have, maybe with the help of dokku. And maybe I'll setup a codeship deploy? Or github actions
if I end up making this open source. Choices, choices.
