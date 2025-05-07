<?php

namespace Database\Seeders;

use App\Models\LearningPath;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class LearningPathSeeder extends Seeder
{
    public function run()
    {
        // 1. Introduction to Drawing
		$path1 = LearningPath::create([
			'title' => 'Introduction to Drawing',
			'description' => 'Learn the basics of drawing, from sketching to shading.',
			'is_premium' => false,
		]);
		$topics1 = [
			['title' => 'Drawing Tools', 'description' => 'Understand pencils, paper, and erasers for sketching.', 'resources' => json_encode(['https://www.youtube.com/watch?v=zv1yK74o4iM', 'https://www.youtube.com/watch?v=6zKq4lG0q1c']), 'order' => 1],
			['title' => 'Basic Shapes', 'description' => 'Master drawing circles, squares, and triangles.', 'resources' => json_encode(['https://www.youtube.com/watch?v=9oM3z7lV0cQ', 'https://www.youtube.com/watch?v=2fU_86eMZmY']), 'order' => 2],
			['title' => 'Shading Techniques', 'description' => 'Learn how to add depth with shading.', 'resources' => json_encode(['https://www.youtube.com/watch?v=7kL4xVdt4zM', 'https://www.youtube.com/watch?v=0z5i6Y8z7fY']), 'order' => 3],
			['title' => 'Perspective Drawing', 'description' => 'Understand one-point and two-point perspective.', 'resources' => json_encode(['https://www.youtube.com/watch?v=7Z6H4rZ12Zg', 'https://www.youtube.com/watch?v=1v3x3k_0a8c']), 'order' => 4],
			['title' => 'Drawing Simple Objects', 'description' => 'Practice drawing everyday objects like a cup.', 'resources' => json_encode(['https://www.youtube.com/watch?v=8p7v3o4q2tE', 'https://www.youtube.com/watch?v=4q8k6z3L5jM']), 'order' => 5],
		];
		foreach ($topics1 as $topic) {
			Topic::create([
				'path_id' => $path1->id,
				'title' => $topic['title'],
				'description' => $topic['description'],
				'resources' => $topic['resources'],
				'order' => $topic['order'],
			]);
		}

        // 2. Digital Art Basics
        $path2 = LearningPath::create([
            'title' => 'Digital Art Basics',
            'description' => 'Learn how to create digital art using tools like Procreate or Photoshop.',
            'is_premium' => false,
        ]);
        $topics2 = [
            ['title' => 'Digital Art Tools', 'description' => 'Overview of software like Procreate and Photoshop.', 'resources' => json_encode(['https://www.youtube.com/watch?v=digital-art-tools']), 'order' => 1],
            ['title' => 'Setting Up Your Canvas', 'description' => 'Learn how to set up a digital canvas.', 'resources' => json_encode(['https://www.youtube.com/watch?v=setup-canvas']), 'order' => 2],
            ['title' => 'Basic Brushes', 'description' => 'Understand different brush types and their uses.', 'resources' => json_encode(['https://www.youtube.com/watch?v=basic-brushes']), 'order' => 3],
            ['title' => 'Color Theory', 'description' => 'Learn the basics of color in digital art.', 'resources' => json_encode(['https://www.youtube.com/watch?v=color-theory']), 'order' => 4],
            ['title' => 'Creating Your First Artwork', 'description' => 'Draw a simple digital piece.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-artwork']), 'order' => 5],
        ];
        foreach ($topics2 as $topic) {
            Topic::create([
                'path_id' => $path2->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 3. Photography for Beginners
        $path3 = LearningPath::create([
            'title' => 'Photography for Beginners',
            'description' => 'Learn the basics of photography with any camera.',
            'is_premium' => false,
        ]);
        $topics3 = [
            ['title' => 'Camera Basics', 'description' => 'Understand your camera’s settings.', 'resources' => json_encode(['https://www.youtube.com/watch?v=camera-basics']), 'order' => 1],
            ['title' => 'Composition Rules', 'description' => 'Learn the rule of thirds and framing.', 'resources' => json_encode(['https://www.youtube.com/watch?v=composition-rules']), 'order' => 2],
            ['title' => 'Lighting Techniques', 'description' => 'Use natural and artificial light effectively.', 'resources' => json_encode(['https://www.youtube.com/watch?v=lighting-techniques']), 'order' => 3],
            ['title' => 'Editing Photos', 'description' => 'Basic editing with free tools like GIMP.', 'resources' => json_encode(['https://www.youtube.com/watch?v=photo-editing']), 'order' => 4],
            ['title' => 'Your First Photo Shoot', 'description' => 'Plan and execute a simple shoot.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-photo-shoot']), 'order' => 5],
        ];
        foreach ($topics3 as $topic) {
            Topic::create([
                'path_id' => $path3->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 4. Creative Writing 101
        $path4 = LearningPath::create([
            'title' => 'Creative Writing 101',
            'description' => 'Learn the fundamentals of storytelling and writing.',
            'is_premium' => false,
        ]);
        $topics4 = [
            ['title' => 'Story Structure', 'description' => 'Understand the three-act structure.', 'resources' => json_encode(['https://www.youtube.com/watch?v=story-structure']), 'order' => 1],
            ['title' => 'Character Development', 'description' => 'Create compelling characters.', 'resources' => json_encode(['https://www.youtube.com/watch?v=character-development']), 'order' => 2],
            ['title' => 'Dialogue Basics', 'description' => 'Write realistic and engaging dialogue.', 'resources' => json_encode(['https://www.youtube.com/watch?v=dialogue-basics']), 'order' => 3],
            ['title' => 'Setting the Scene', 'description' => 'Describe settings vividly.', 'resources' => json_encode(['https://www.youtube.com/watch?v=setting-scene']), 'order' => 4],
            ['title' => 'Writing Your First Short Story', 'description' => 'Put it all together in a short story.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-short-story']), 'order' => 5],
        ];
        foreach ($topics4 as $topic) {
            Topic::create([
                'path_id' => $path4->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 5. Introduction to Music Theory
        $path5 = LearningPath::create([
            'title' => 'Introduction to Music Theory',
            'description' => 'Learn the basics of music theory to understand and create music.',
            'is_premium' => false,
        ]);
        $topics5 = [
            ['title' => 'Notes and Scales', 'description' => 'Understand musical notes and major/minor scales.', 'resources' => json_encode(['https://www.youtube.com/watch?v=notes-scales']), 'order' => 1],
            ['title' => 'Chords Basics', 'description' => 'Learn how to build and play chords.', 'resources' => json_encode(['https://www.youtube.com/watch?v=chords-basics']), 'order' => 2],
            ['title' => 'Rhythm and Tempo', 'description' => 'Master rhythm and keeping time.', 'resources' => json_encode(['https://www.youtube.com/watch?v=rhythm-tempo']), 'order' => 3],
            ['title' => 'Reading Sheet Music', 'description' => 'Learn to read basic sheet music.', 'resources' => json_encode(['https://www.youtube.com/watch?v=sheet-music']), 'order' => 4],
            ['title' => 'Simple Composition', 'description' => 'Write a short melody using what you’ve learned.', 'resources' => json_encode(['https://www.youtube.com/watch?v=simple-composition']), 'order' => 5],
        ];
        foreach ($topics5 as $topic) {
            Topic::create([
                'path_id' => $path5->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 6. Songwriting Basics
        $path6 = LearningPath::create([
            'title' => 'Songwriting Basics',
            'description' => 'Learn how to write your own songs with lyrics and melody.',
            'is_premium' => false,
        ]);
        $topics6 = [
            ['title' => 'Lyric Writing', 'description' => 'Craft meaningful and catchy lyrics.', 'resources' => json_encode(['https://www.youtube.com/watch?v=lyric-writing']), 'order' => 1],
            ['title' => 'Melody Creation', 'description' => 'Create a melody that fits your lyrics.', 'resources' => json_encode(['https://www.youtube.com/watch?v=melody-creation']), 'order' => 2],
            ['title' => 'Song Structure', 'description' => 'Understand verse, chorus, and bridge.', 'resources' => json_encode(['https://www.youtube.com/watch?v=song-structure']), 'order' => 3],
            ['title' => 'Using Chords', 'description' => 'Add chords to your melody.', 'resources' => json_encode(['https://www.youtube.com/watch?v=using-chords']), 'order' => 4],
            ['title' => 'Recording a Demo', 'description' => 'Record a simple demo of your song.', 'resources' => json_encode(['https://www.youtube.com/watch?v=record-demo']), 'order' => 5],
        ];
        foreach ($topics6 as $topic) {
            Topic::create([
                'path_id' => $path6->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 7. Graphic Design Essentials
        $path7 = LearningPath::create([
            'title' => 'Graphic Design Essentials',
            'description' => 'Learn the basics of graphic design using free tools.',
            'is_premium' => false,
        ]);
        $topics7 = [
            ['title' => 'Design Principles', 'description' => 'Understand balance, contrast, and alignment.', 'resources' => json_encode(['https://www.youtube.com/watch?v=design-principles']), 'order' => 1],
            ['title' => 'Typography Basics', 'description' => 'Learn about fonts and their uses.', 'resources' => json_encode(['https://www.youtube.com/watch?v=typography-basics']), 'order' => 2],
            ['title' => 'Color Theory', 'description' => 'Master color combinations and palettes.', 'resources' => json_encode(['https://www.youtube.com/watch?v=color-theory-graphic']), 'order' => 3],
            ['title' => 'Using Canva', 'description' => 'Create designs with Canva’s free tools.', 'resources' => json_encode(['https://www.youtube.com/watch?v=using-canva']), 'order' => 4],
            ['title' => 'Your First Poster', 'description' => 'Design a simple poster.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-poster']), 'order' => 5],
        ];
        foreach ($topics7 as $topic) {
            Topic::create([
                'path_id' => $path7->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 8. Video Editing for Beginners
        $path8 = LearningPath::create([
            'title' => 'Video Editing for Beginners',
            'description' => 'Learn how to edit videos using free software.',
            'is_premium' => false,
        ]);
        $topics8 = [
            ['title' => 'Video Editing Software', 'description' => 'Overview of free tools like iMovie.', 'resources' => json_encode(['https://www.youtube.com/watch?v=video-editing-software']), 'order' => 1],
            ['title' => 'Importing Footage', 'description' => 'Learn how to import and organize clips.', 'resources' => json_encode(['https://www.youtube.com/watch?v=importing-footage']), 'order' => 2],
            ['title' => 'Basic Cuts and Transitions', 'description' => 'Master cutting and adding transitions.', 'resources' => json_encode(['https://www.youtube.com/watch?v=cuts-transitions']), 'order' => 3],
            ['title' => 'Adding Music and Effects', 'description' => 'Enhance your video with audio and effects.', 'resources' => json_encode(['https://www.youtube.com/watch?v=music-effects']), 'order' => 4],
            ['title' => 'Exporting Your Video', 'description' => 'Export your first edited video.', 'resources' => json_encode(['https://www.youtube.com/watch?v=export-video']), 'order' => 5],
        ];
        foreach ($topics8 as $topic) {
            Topic::create([
                'path_id' => $path8->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 9. Introduction to 3D Modeling
        $path9 = LearningPath::create([
            'title' => 'Introduction to 3D Modeling',
            'description' => 'Learn the basics of 3D modeling with Blender.',
            'is_premium' => false,
        ]);
        $topics9 = [
            ['title' => 'Blender Basics', 'description' => 'Get started with Blender’s interface.', 'resources' => json_encode(['https://www.youtube.com/watch?v=blender-basics']), 'order' => 1],
            ['title' => 'Creating Simple Shapes', 'description' => 'Model basic 3D shapes like cubes.', 'resources' => json_encode(['https://www.youtube.com/watch?v=simple-shapes-3d']), 'order' => 2],
            ['title' => 'Texturing', 'description' => 'Add textures to your models.', 'resources' => json_encode(['https://www.youtube.com/watch?v=texturing-3d']), 'order' => 3],
            ['title' => 'Lighting and Rendering', 'description' => 'Set up lighting and render your model.', 'resources' => json_encode(['https://www.youtube.com/watch?v=lighting-rendering']), 'order' => 4],
            ['title' => 'Your First 3D Model', 'description' => 'Create a simple 3D object like a cup.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-3d-model']), 'order' => 5],
        ];
        foreach ($topics9 as $topic) {
            Topic::create([
                'path_id' => $path9->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 10. 3D Animation Basics
        $path10 = LearningPath::create([
            'title' => '3D Animation Basics',
            'description' => 'Learn how to animate 3D models in Blender.',
            'is_premium' => false,
        ]);
        $topics10 = [
            ['title' => 'Keyframes', 'description' => 'Understand keyframes in animation.', 'resources' => json_encode(['https://www.youtube.com/watch?v=keyframes-3d']), 'order' => 1],
            ['title' => 'Rigging Basics', 'description' => 'Learn how to rig a model for animation.', 'resources' => json_encode(['https://www.youtube.com/watch?v=rigging-basics']), 'order' => 2],
            ['title' => 'Animating Movement', 'description' => 'Create a simple walk cycle.', 'resources' => json_encode(['https://www.youtube.com/watch?v=animating-movement']), 'order' => 3],
            ['title' => 'Rendering Animation', 'description' => 'Render your animated scene.', 'resources' => json_encode(['https://www.youtube.com/watch?v=render-animation']), 'order' => 4],
            ['title' => 'Your First Animation', 'description' => 'Animate a simple object moving.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-animation']), 'order' => 5],
        ];
        foreach ($topics10 as $topic) {
            Topic::create([
                'path_id' => $path10->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 11. Programming Fundamentals
        $path11 = LearningPath::create([
            'title' => 'Programming Fundamentals',
            'description' => 'Learn the basics of programming with any language.',
            'is_premium' => false,
        ]);
        $topics11 = [
            ['title' => 'What is Programming?', 'description' => 'Understand what coding is and why it matters.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-programming']), 'order' => 1],
            ['title' => 'Variables and Data Types', 'description' => 'Learn how to store and use data.', 'resources' => json_encode(['https://www.youtube.com/watch?v=variables-data-types']), 'order' => 2],
            ['title' => 'Loops and Conditionals', 'description' => 'Control the flow of your program.', 'resources' => json_encode(['https://www.youtube.com/watch?v=loops-conditionals']), 'order' => 3],
            ['title' => 'Functions', 'description' => 'Write reusable code with functions.', 'resources' => json_encode(['https://www.youtube.com/watch?v=functions-programming']), 'order' => 4],
            ['title' => 'Your First Program', 'description' => 'Write a simple program like a calculator.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-program']), 'order' => 5],
        ];
        foreach ($topics11 as $topic) {
            Topic::create([
                'path_id' => $path11->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 12. Web Development Basics
        $path12 = LearningPath::create([
            'title' => 'Web Development Basics',
            'description' => 'Learn how to build simple websites with HTML, CSS, and JavaScript.',
            'is_premium' => false,
        ]);
        $topics12 = [
            ['title' => 'HTML Basics', 'description' => 'Understand HTML tags and structure.', 'resources' => json_encode(['https://www.youtube.com/watch?v=html-basics']), 'order' => 1],
            ['title' => 'CSS Fundamentals', 'description' => 'Style your website with CSS.', 'resources' => json_encode(['https://www.youtube.com/watch?v=css-fundamentals']), 'order' => 2],
            ['title' => 'JavaScript Essentials', 'description' => 'Add interactivity with JavaScript.', 'resources' => json_encode(['https://www.youtube.com/watch?v=javascript-essentials']), 'order' => 3],
            ['title' => 'Building a Simple Website', 'description' => 'Create a one-page website.', 'resources' => json_encode(['https://www.youtube.com/watch?v=simple-website']), 'order' => 4],
            ['title' => 'Deploying Your Site', 'description' => 'Publish your site using GitHub Pages.', 'resources' => json_encode(['https://www.youtube.com/watch?v=deploy-site']), 'order' => 5],
        ];
        foreach ($topics12 as $topic) {
            Topic::create([
                'path_id' => $path12->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 13. Advanced Web Development
        $path13 = LearningPath::create([
            'title' => 'Advanced Web Development',
            'description' => 'Take your web development skills to the next level.',
            'is_premium' => true,
        ]);
        $topics13 = [
            ['title' => 'JavaScript Frameworks', 'description' => 'Learn React or Vue for dynamic sites.', 'resources' => json_encode(['https://www.youtube.com/watch?v=javascript-frameworks']), 'order' => 1],
            ['title' => 'Backend Basics', 'description' => 'Understand servers with Node.js or PHP.', 'resources' => json_encode(['https://www.youtube.com/watch?v=backend-basics']), 'order' => 2],
            ['title' => 'APIs and AJAX', 'description' => 'Fetch data dynamically with APIs.', 'resources' => json_encode(['https://www.youtube.com/watch?v=apis-ajax']), 'order' => 3],
            ['title' => 'Database Integration', 'description' => 'Connect your site to a database.', 'resources' => json_encode(['https://www.youtube.com/watch?v=database-integration']), 'order' => 4],
            ['title' => 'Building a Full-Stack App', 'description' => 'Create a simple full-stack app.', 'resources' => json_encode(['https://www.youtube.com/watch?v=full-stack-app']), 'order' => 5],
        ];
        foreach ($topics13 as $topic) {
            Topic::create([
                'path_id' => $path13->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 14. Game Development for Beginners
        $path14 = LearningPath::create([
            'title' => 'Game Development for Beginners',
            'description' => 'Learn the basics of creating your own video games.',
            'is_premium' => false,
        ]);
        $topics14 = [
            ['title' => 'Programming Fundamentals', 'description' => 'Learn the essentials of coding.', 'resources' => json_encode(['https://www.youtube.com/watch?v=programming-fundamentals-game']), 'order' => 1],
            ['title' => 'Game Engines', 'description' => 'Explore Unity and Unreal Engine.', 'resources' => json_encode(['https://www.youtube.com/watch?v=game-engines']), 'order' => 2],
            ['title' => 'Game Design Principles', 'description' => 'Understand mechanics and player engagement.', 'resources' => json_encode(['https://www.youtube.com/watch?v=game-design-principles']), 'order' => 3],
            ['title' => '2D Game Basics', 'description' => 'Create a simple 2D game in Unity.', 'resources' => json_encode(['https://www.youtube.com/watch?v=2d-game-basics']), 'order' => 4],
            ['title' => 'Publishing Your Game', 'description' => 'Share your game on platforms like itch.io.', 'resources' => json_encode(['https://www.youtube.com/watch?v=publish-game']), 'order' => 5],
        ];
        foreach ($topics14 as $topic) {
            Topic::create([
                'path_id' => $path14->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 15. Advanced Game Design
        $path15 = LearningPath::create([
            'title' => 'Advanced Game Design',
            'description' => 'Dive deeper into game development with advanced concepts.',
            'is_premium' => true,
        ]);
        $topics15 = [
            ['title' => '3D Game Basics', 'description' => 'Create a simple 3D game.', 'resources' => json_encode(['https://www.youtube.com/watch?v=3d-game-basics']), 'order' => 1],
            ['title' => 'Multiplayer Mechanics', 'description' => 'Add multiplayer features to your game.', 'resources' => json_encode(['https://www.youtube.com/watch?v=multiplayer-mechanics']), 'order' => 2],
            ['title' => 'AI in Games', 'description' => 'Implement basic AI for enemies.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ai-in-games']), 'order' => 3],
            ['title' => 'Monetization Strategies', 'description' => 'Learn how to monetize your game.', 'resources' => json_encode(['https://www.youtube.com/watch?v=monetization-strategies']), 'order' => 4],
            ['title' => 'Publishing to Steam', 'description' => 'Prepare and publish your game on Steam.', 'resources' => json_encode(['https://www.youtube.com/watch?v=publish-steam']), 'order' => 5],
        ];
        foreach ($topics15 as $topic) {
            Topic::create([
                'path_id' => $path15->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 16. Introduction to Python
        $path16 = LearningPath::create([
            'title' => 'Introduction to Python',
            'description' => 'Learn the basics of Python programming.',
            'is_premium' => false,
        ]);
        $topics16 = [
            ['title' => 'Python Setup', 'description' => 'Install Python and set up your environment.', 'resources' => json_encode(['https://www.youtube.com/watch?v=python-setup']), 'order' => 1],
            ['title' => 'Python Syntax', 'description' => 'Learn Python’s basic syntax.', 'resources' => json_encode(['https://www.youtube.com/watch?v=python-syntax']), 'order' => 2],
            ['title' => 'Data Structures', 'description' => 'Work with lists, dictionaries, and tuples.', 'resources' => json_encode(['https://www.youtube.com/watch?v=data-structures-python']), 'order' => 3],
            ['title' => 'Functions in Python', 'description' => 'Write reusable code with functions.', 'resources' => json_encode(['https://www.youtube.com/watch?v=functions-python']), 'order' => 4],
            ['title' => 'Your First Python Project', 'description' => 'Build a simple project like a to-do list.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-python-project']), 'order' => 5],
        ];
        foreach ($topics16 as $topic) {
            Topic::create([
                'path_id' => $path16->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 17. Data Science Basics
        $path17 = LearningPath::create([
            'title' => 'Data Science Basics',
            'description' => 'Learn the fundamentals of data science with Python.',
            'is_premium' => false,
        ]);
        $topics17 = [
            ['title' => 'What is Data Science?', 'description' => 'Understand the field of data science.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-data-science']), 'order' => 1],
            ['title' => 'Pandas Basics', 'description' => 'Work with data using Pandas.', 'resources' => json_encode(['https://www.youtube.com/watch?v=pandas-basics']), 'order' => 2],
            ['title' => 'NumPy Essentials', 'description' => 'Perform calculations with NumPy.', 'resources' => json_encode(['https://www.youtube.com/watch?v=numpy-essentials']), 'order' => 3],
            ['title' => 'Data Visualization', 'description' => 'Create charts with Matplotlib.', 'resources' => json_encode(['https://www.youtube.com/watch?v=data-visualization']), 'order' => 4],
            ['title' => 'Your First Data Analysis', 'description' => 'Analyze a small dataset.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-data-analysis']), 'order' => 5],
        ];
        foreach ($topics17 as $topic) {
            Topic::create([
                'path_id' => $path17->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 18. Cybersecurity Essentials
        $path18 = LearningPath::create([
            'title' => 'Cybersecurity Essentials',
            'description' => 'Learn the basics of protecting systems and data.',
            'is_premium' => false,
        ]);
        $topics18 = [
            ['title' => 'What is Cybersecurity?', 'description' => 'Understand the importance of cybersecurity.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-cybersecurity']), 'order' => 1],
            ['title' => 'Common Threats', 'description' => 'Learn about phishing, malware, and more.', 'resources' => json_encode(['https://www.youtube.com/watch?v=common-threats']), 'order' => 2],
            ['title' => 'Password Security', 'description' => 'Create and manage strong passwords.', 'resources' => json_encode(['https://www.youtube.com/watch?v=password-security']), 'order' => 3],
            ['title' => 'Encryption Basics', 'description' => 'Understand how encryption works.', 'resources' => json_encode(['https://www.youtube.com/watch?v=encryption-basics']), 'order' => 4],
            ['title' => 'Securing Your Device', 'description' => 'Protect your computer with best practices.', 'resources' => json_encode(['https://www.youtube.com/watch?v=secure-device']), 'order' => 5],
        ];
        foreach ($topics18 as $topic) {
            Topic::create([
                'path_id' => $path18->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 19. Mobile App Development 101
        $path19 = LearningPath::create([
            'title' => 'Mobile App Development 101',
            'description' => 'Learn the basics of building mobile apps.',
            'is_premium' => false,
        ]);
        $topics19 = [
            ['title' => 'What is Mobile Development?', 'description' => 'Understand mobile app development.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-mobile-dev']), 'order' => 1],
            ['title' => 'Setting Up Flutter', 'description' => 'Install Flutter and set up your environment.', 'resources' => json_encode(['https://www.youtube.com/watch?v=flutter-setup']), 'order' => 2],
            ['title' => 'Building Your First App', 'description' => 'Create a simple app with Flutter.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-flutter-app']), 'order' => 3],
            ['title' => 'Adding Features', 'description' => 'Add buttons and navigation to your app.', 'resources' => json_encode(['https://www.youtube.com/watch?v=flutter-features']), 'order' => 4],
            ['title' => 'Publishing Your App', 'description' => 'Publish your app to the Play Store.', 'resources' => json_encode(['https://www.youtube.com/watch?v=publish-flutter-app']), 'order' => 5],
        ];
        foreach ($topics19 as $topic) {
            Topic::create([
                'path_id' => $path19->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 20. AI and Machine Learning Basics
        $path20 = LearningPath::create([
            'title' => 'AI and Machine Learning Basics',
            'description' => 'Learn the fundamentals of AI and machine learning.',
            'is_premium' => false,
        ]);
        $topics20 = [
            ['title' => 'What is AI?', 'description' => 'Understand artificial intelligence concepts.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-ai']), 'order' => 1],
            ['title' => 'Machine Learning Overview', 'description' => 'Learn the basics of machine learning.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ml-overview']), 'order' => 2],
            ['title' => 'Python for ML', 'description' => 'Use Python libraries like scikit-learn.', 'resources' => json_encode(['https://www.youtube.com/watch?v=python-ml']), 'order' => 3],
            ['title' => 'Building a Simple Model', 'description' => 'Create a basic ML model.', 'resources' => json_encode(['https://www.youtube.com/watch?v=simple-ml-model']), 'order' => 4],
            ['title' => 'Evaluating Your Model', 'description' => 'Learn how to evaluate ML models.', 'resources' => json_encode(['https://www.youtube.com/watch?v=evaluate-ml-model']), 'order' => 5],
        ];
        foreach ($topics20 as $topic) {
            Topic::create([
                'path_id' => $path20->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 21. Roman History for Beginners
        $path21 = LearningPath::create([
            'title' => 'Roman History for Beginners',
            'description' => 'Explore the history of Ancient Rome.',
            'is_premium' => false,
        ]);
        $topics21 = [
            ['title' => 'Founding of Rome', 'description' => 'Learn about the myth of Romulus and Remus.', 'resources' => json_encode(['https://www.youtube.com/watch?v=founding-rome']), 'order' => 1],
            ['title' => 'The Roman Republic', 'description' => 'Understand the Republic’s structure.', 'resources' => json_encode(['https://www.youtube.com/watch?v=roman-republic']), 'order' => 2],
            ['title' => 'Rise of the Empire', 'description' => 'Explore the transition to the Roman Empire.', 'resources' => json_encode(['https://www.youtube.com/watch?v=rise-empire']), 'order' => 3],
            ['title' => 'Roman Culture', 'description' => 'Learn about Roman art, religion, and daily life.', 'resources' => json_encode(['https://www.youtube.com/watch?v=roman-culture']), 'order' => 4],
            ['title' => 'Fall of Rome', 'description' => 'Understand the decline of the Western Empire.', 'resources' => json_encode(['https://www.youtube.com/watch?v=fall-rome']), 'order' => 5],
        ];
        foreach ($topics21 as $topic) {
            Topic::create([
                'path_id' => $path21->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 22. Medieval History
        $path22 = LearningPath::create([
            'title' => 'Medieval History',
            'description' => 'Learn about the Middle Ages in Europe.',
            'is_premium' => false,
        ]);
        $topics22 = [
            ['title' => 'The Early Middle Ages', 'description' => 'Explore the fall of Rome and the rise of feudalism.', 'resources' => json_encode(['https://www.youtube.com/watch?v=early-middle-ages']), 'order' => 1],
            ['title' => 'Feudal System', 'description' => 'Understand the feudal hierarchy.', 'resources' => json_encode(['https://www.youtube.com/watch?v=feudal-system']), 'order' => 2],
            ['title' => 'The Crusades', 'description' => 'Learn about the religious wars.', 'resources' => json_encode(['https://www.youtube.com/watch?v=crusades']), 'order' => 3],
            ['title' => 'The Black Death', 'description' => 'Understand the impact of the plague.', 'resources' => json_encode(['https://www.youtube.com/watch?v=black-death']), 'order' => 4],
            ['title' => 'The Late Middle Ages', 'description' => 'Explore the transition to the Renaissance.', 'resources' => json_encode(['https://www.youtube.com/watch?v=late-middle-ages']), 'order' => 5],
        ];
        foreach ($topics22 as $topic) {
            Topic::create([
                'path_id' => $path22->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 23. World War I Overview
        $path23 = LearningPath::create([
            'title' => 'World War I Overview',
            'description' => 'Learn the key events of World War I.',
            'is_premium' => false,
        ]);
        $topics23 = [
            ['title' => 'Causes of WWI', 'description' => 'Understand the events leading to WWI.', 'resources' => json_encode(['https://www.youtube.com/watch?v=causes-wwi']), 'order' => 1],
            ['title' => 'Major Battles', 'description' => 'Explore key battles like the Somme.', 'resources' => json_encode(['https://www.youtube.com/watch?v=major-battles-wwi']), 'order' => 2],
            ['title' => 'Trench Warfare', 'description' => 'Learn about life in the trenches.', 'resources' => json_encode(['https://www.youtube.com/watch?v=trench-warfare']), 'order' => 3],
            ['title' => 'The Treaty of Versailles', 'description' => 'Understand the end of WWI.', 'resources' => json_encode(['https://www.youtube.com/watch?v=treaty-versailles']), 'order' => 4],
            ['title' => 'Impact of WWI', 'description' => 'Explore the global impact of the war.', 'resources' => json_encode(['https://www.youtube.com/watch?v=impact-wwi']), 'order' => 5],
        ];
        foreach ($topics23 as $topic) {
            Topic::create([
                'path_id' => $path23->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 24. World War II Overview
        $path24 = LearningPath::create([
            'title' => 'World War II Overview',
            'description' => 'Learn the key events of World War II.',
            'is_premium' => false,
        ]);
        $topics24 = [
            ['title' => 'Causes of WWII', 'description' => 'Understand the events leading to WWII.', 'resources' => json_encode(['https://www.youtube.com/watch?v=causes-wwii']), 'order' => 1],
            ['title' => 'Key Leaders', 'description' => 'Learn about leaders like Churchill and Hitler.', 'resources' => json_encode(['https://www.youtube.com/watch?v=key-leaders-wwii']), 'order' => 2],
            ['title' => 'Major Battles', 'description' => 'Explore battles like D-Day.', 'resources' => json_encode(['https://www.youtube.com/watch?v=major-battles-wwii']), 'order' => 3],
            ['title' => 'The Holocaust', 'description' => 'Understand the tragedy of the Holocaust.', 'resources' => json_encode(['https://www.youtube.com/watch?v=holocaust']), 'order' => 4],
            ['title' => 'End of WWII', 'description' => 'Learn about the war’s conclusion.', 'resources' => json_encode(['https://www.youtube.com/watch?v=end-wwii']), 'order' => 5],
        ];
        foreach ($topics24 as $topic) {
            Topic::create([
                'path_id' => $path24->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 25. Introduction to Geopolitics
        $path25 = LearningPath::create([
            'title' => 'Introduction to Geopolitics',
            'description' => 'Learn the basics of global politics and power.',
            'is_premium' => false,
        ]);
        $topics25 = [
            ['title' => 'What is Geopolitics?', 'description' => 'Understand the study of geopolitics.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-geopolitics']), 'order' => 1],
            ['title' => 'Key Nations', 'description' => 'Learn about major global powers.', 'resources' => json_encode(['https://www.youtube.com/watch?v=key-nations']), 'order' => 2],
            ['title' => 'Alliances and Conflicts', 'description' => 'Explore NATO, the UN, and conflicts.', 'resources' => json_encode(['https://www.youtube.com/watch?v=alliances-conflicts']), 'order' => 3],
            ['title' => 'Geography and Power', 'description' => 'Understand how geography shapes politics.', 'resources' => json_encode(['https://www.youtube.com/watch?v=geography-power']), 'order' => 4],
            ['title' => 'Case Study: Cold War', 'description' => 'Analyze the Cold War as a geopolitical event.', 'resources' => json_encode(['https://www.youtube.com/watch?v=cold-war-geopolitics']), 'order' => 5],
        ];
        foreach ($topics25 as $topic) {
            Topic::create([
                'path_id' => $path25->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 26. Modern Geopolitics
        $path26 = LearningPath::create([
            'title' => 'Modern Geopolitics',
            'description' => 'Explore global politics in the 21st century.',
            'is_premium' => false,
        ]);
        $topics26 = [
            ['title' => 'Post-Cold War Era', 'description' => 'Understand the world after the Cold War.', 'resources' => json_encode(['https://www.youtube.com/watch?v=post-cold-war']), 'order' => 1],
            ['title' => 'Rise of China', 'description' => 'Learn about China’s global influence.', 'resources' => json_encode(['https://www.youtube.com/watch?v=rise-of-china']), 'order' => 2],
            ['title' => 'Climate Politics', 'description' => 'Explore the geopolitics of climate change.', 'resources' => json_encode(['https://www.youtube.com/watch?v=climate-politics']), 'order' => 3],
            ['title' => 'Cyber Warfare', 'description' => 'Understand the role of cyber in geopolitics.', 'resources' => json_encode(['https://www.youtube.com/watch?v=cyber-warfare']), 'order' => 4],
            ['title' => 'Case Study: Ukraine', 'description' => 'Analyze the Ukraine conflict.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ukraine-geopolitics']), 'order' => 5],
        ];
        foreach ($topics26 as $topic) {
            Topic::create([
                'path_id' => $path26->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 27. Ancient Civilizations
        $path27 = LearningPath::create([
            'title' => 'Ancient Civilizations',
            'description' => 'Explore the earliest human civilizations.',
            'is_premium' => false,
        ]);
        $topics27 = [
            ['title' => 'Mesopotamia', 'description' => 'Learn about the cradle of civilization.', 'resources' => json_encode(['https://www.youtube.com/watch?v=mesopotamia']), 'order' => 1],
            ['title' => 'Ancient Egypt', 'description' => 'Explore the pyramids and pharaohs.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ancient-egypt']), 'order' => 2],
            ['title' => 'Ancient Greece', 'description' => 'Understand Greek culture and democracy.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ancient-greece']), 'order' => 3],
            ['title' => 'The Indus Valley', 'description' => 'Learn about the Harappan civilization.', 'resources' => json_encode(['https://www.youtube.com/watch?v=indus-valley']), 'order' => 4],
            ['title' => 'Ancient China', 'description' => 'Explore early Chinese dynasties.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ancient-china']), 'order' => 5],
        ];
        foreach ($topics27 as $topic) {
            Topic::create([
                'path_id' => $path27->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 28. History of Art
        $path28 = LearningPath::create([
            'title' => 'History of Art',
            'description' => 'Learn about major art movements through history.',
            'is_premium' => false,
        ]);
        $topics28 = [
            ['title' => 'Ancient Art', 'description' => 'Explore art from Egypt and Greece.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ancient-art']), 'order' => 1],
            ['title' => 'Renaissance Art', 'description' => 'Learn about Da Vinci and Michelangelo.', 'resources' => json_encode(['https://www.youtube.com/watch?v=renaissance-art']), 'order' => 2],
            ['title' => 'Impressionism', 'description' => 'Understand Monet and the Impressionists.', 'resources' => json_encode(['https://www.youtube.com/watch?v=impressionism']), 'order' => 3],
            ['title' => 'Modern Art', 'description' => 'Explore Picasso and abstract art.', 'resources' => json_encode(['https://www.youtube.com/watch?v=modern-art']), 'order' => 4],
            ['title' => 'Contemporary Art', 'description' => 'Learn about art today.', 'resources' => json_encode(['https://www.youtube.com/watch?v=contemporary-art']), 'order' => 5],
        ];
        foreach ($topics28 as $topic) {
            Topic::create([
                'path_id' => $path28->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 29. Philosophy for Beginners
        $path29 = LearningPath::create([
            'title' => 'Philosophy for Beginners',
            'description' => 'Learn the basics of philosophical thought.',
            'is_premium' => false,
        ]);
        $topics29 = [
            ['title' => 'What is Philosophy?', 'description' => 'Understand the scope of philosophy.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-philosophy']), 'order' => 1],
            ['title' => 'Socrates and Plato', 'description' => 'Learn about early Greek philosophers.', 'resources' => json_encode(['https://www.youtube.com/watch?v=socrates-plato']), 'order' => 2],
            ['title' => 'Ethics Basics', 'description' => 'Explore concepts of right and wrong.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ethics-basics']), 'order' => 3],
            ['title' => 'Modern Philosophy', 'description' => 'Understand Descartes and Kant.', 'resources' => json_encode(['https://www.youtube.com/watch?v=modern-philosophy']), 'order' => 4],
            ['title' => 'Applying Philosophy', 'description' => 'Use philosophy in daily life.', 'resources' => json_encode(['https://www.youtube.com/watch?v=apply-philosophy']), 'order' => 5],
        ];
        foreach ($topics29 as $topic) {
            Topic::create([
                'path_id' => $path29->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 30. World Religions Overview
        $path30 = LearningPath::create([
            'title' => 'World Religions Overview',
            'description' => 'Learn about the major world religions.',
            'is_premium' => false,
        ]);
        $topics30 = [
            ['title' => 'Christianity', 'description' => 'Understand the basics of Christianity.', 'resources' => json_encode(['https://www.youtube.com/watch?v=christianity-basics']), 'order' => 1],
            ['title' => 'Islam', 'description' => 'Learn about Islam and its practices.', 'resources' => json_encode(['https://www.youtube.com/watch?v=islam-basics']), 'order' => 2],
            ['title' => 'Hinduism', 'description' => 'Explore the beliefs of Hinduism.', 'resources' => json_encode(['https://www.youtube.com/watch?v=hinduism-basics']), 'order' => 3],
            ['title' => 'Buddhism', 'description' => 'Understand the teachings of Buddhism.', 'resources' => json_encode(['https://www.youtube.com/watch?v=buddhism-basics']), 'order' => 4],
            ['title' => 'Judaism', 'description' => 'Learn about Jewish history and beliefs.', 'resources' => json_encode(['https://www.youtube.com/watch?v=judaism-basics']), 'order' => 5],
        ];
        foreach ($topics30 as $topic) {
            Topic::create([
                'path_id' => $path30->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 31. Biology Basics
        $path31 = LearningPath::create([
            'title' => 'Biology Basics',
            'description' => 'Learn the fundamentals of biology.',
            'is_premium' => false,
        ]);
        $topics31 = [
            ['title' => 'What is Biology?', 'description' => 'Understand the study of life.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-biology']), 'order' => 1],
            ['title' => 'Cells', 'description' => 'Learn about the building blocks of life.', 'resources' => json_encode(['https://www.youtube.com/watch?v=cells-basics']), 'order' => 2],
            ['title' => 'DNA and Genetics', 'description' => 'Understand the basics of genetics.', 'resources' => json_encode(['https://www.youtube.com/watch?v=dna-genetics']), 'order' => 3],
            ['title' => 'Ecosystems', 'description' => 'Explore how living things interact.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ecosystems-basics']), 'order' => 4],
            ['title' => 'Human Body Systems', 'description' => 'Learn about the circulatory system.', 'resources' => json_encode(['https://www.youtube.com/watch?v=human-body-systems']), 'order' => 5],
        ];
        foreach ($topics31 as $topic) {
            Topic::create([
                'path_id' => $path31->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 32. Chemistry Fundamentals
        $path32 = LearningPath::create([
            'title' => 'Chemistry Fundamentals',
            'description' => 'Learn the basics of chemistry.',
            'is_premium' => false,
        ]);
        $topics32 = [
            ['title' => 'What is Chemistry?', 'description' => 'Understand the science of matter.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-chemistry']), 'order' => 1],
            ['title' => 'Atoms and Elements', 'description' => 'Learn about atoms and the periodic table.', 'resources' => json_encode(['https://www.youtube.com/watch?v=atoms-elements']), 'order' => 2],
            ['title' => 'Chemical Reactions', 'description' => 'Understand how reactions work.', 'resources' => json_encode(['https://www.youtube.com/watch?v=chemical-reactions']), 'order' => 3],
            ['title' => 'Acids and Bases', 'description' => 'Explore pH and chemical properties.', 'resources' => json_encode(['https://www.youtube.com/watch?v=acids-bases']), 'order' => 4],
            ['title' => 'Simple Experiments', 'description' => 'Try a safe chemistry experiment at home.', 'resources' => json_encode(['https://www.youtube.com/watch?v=chemistry-experiments']), 'order' => 5],
        ];
        foreach ($topics32 as $topic) {
            Topic::create([
                'path_id' => $path32->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 33. Physics for Beginners
        $path33 = LearningPath::create([
            'title' => 'Physics for Beginners',
            'description' => 'Learn the basics of physics.',
            'is_premium' => false,
        ]);
        $topics33 = [
            ['title' => 'What is Physics?', 'description' => 'Understand the science of energy and matter.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-physics']), 'order' => 1],
            ['title' => 'Motion and Forces', 'description' => 'Learn about Newton’s laws.', 'resources' => json_encode(['https://www.youtube.com/watch?v=motion-forces']), 'order' => 2],
            ['title' => 'Energy Basics', 'description' => 'Understand kinetic and potential energy.', 'resources' => json_encode(['https://www.youtube.com/watch?v=energy-basics']), 'order' => 3],
            ['title' => 'Gravity', 'description' => 'Explore the force of gravity.', 'resources' => json_encode(['https://www.youtube.com/watch?v=gravity-basics']), 'order' => 4],
            ['title' => 'Simple Physics Experiments', 'description' => 'Try a basic experiment at home.', 'resources' => json_encode(['https://www.youtube.com/watch?v=physics-experiments']), 'order' => 5],
        ];
        foreach ($topics33 as $topic) {
            Topic::create([
                'path_id' => $path33->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 34. Astronomy 101
        $path34 = LearningPath::create([
            'title' => 'Astronomy 101',
            'description' => 'Learn about the universe and its wonders.',
            'is_premium' => false,
        ]);
        $topics34 = [
            ['title' => 'The Solar System', 'description' => 'Explore the planets and the Sun.', 'resources' => json_encode(['https://www.youtube.com/watch?v=solar-system']), 'order' => 1],
            ['title' => 'Stars and Constellations', 'description' => 'Learn about stars and how to spot them.', 'resources' => json_encode(['https://www.youtube.com/watch?v=stars-constellations']), 'order' => 2],
            ['title' => 'Galaxies', 'description' => 'Understand the Milky Way and beyond.', 'resources' => json_encode(['https://www.youtube.com/watch?v=galaxies-basics']), 'order' => 3],
            ['title' => 'Black Holes', 'description' => 'Explore the mystery of black holes.', 'resources' => json_encode(['https://www.youtube.com/watch?v=black-holes']), 'order' => 4],
            ['title' => 'Stargazing Basics', 'description' => 'Learn how to stargaze effectively.', 'resources' => json_encode(['https://www.youtube.com/watch?v=stargazing-basics']), 'order' => 5],
        ];
        foreach ($topics34 as $topic) {
            Topic::create([
                'path_id' => $path34->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 35. Algebra Essentials
        $path35 = LearningPath::create([
            'title' => 'Algebra Essentials',
            'description' => 'Learn the basics of algebra.',
            'is_premium' => false,
        ]);
        $topics35 = [
            ['title' => 'What is Algebra?', 'description' => 'Understand the basics of algebra.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-algebra']), 'order' => 1],
            ['title' => 'Equations', 'description' => 'Learn how to solve simple equations.', 'resources' => json_encode(['https://www.youtube.com/watch?v=equations-basics']), 'order' => 2],
            ['title' => 'Functions', 'description' => 'Understand functions and their graphs.', 'resources' => json_encode(['https://www.youtube.com/watch?v=functions-basics']), 'order' => 3],
            ['title' => 'Inequalities', 'description' => 'Learn how to solve inequalities.', 'resources' => json_encode(['https://www.youtube.com/watch?v=inequalities-basics']), 'order' => 4],
            ['title' => 'Word Problems', 'description' => 'Solve real-world problems with algebra.', 'resources' => json_encode(['https://www.youtube.com/watch?v=algebra-word-problems']), 'order' => 5],
        ];
        foreach ($topics35 as $topic) {
            Topic::create([
                'path_id' => $path35->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 36. Calculus Basics
        $path36 = LearningPath::create([
            'title' => 'Calculus Basics',
            'description' => 'Learn the fundamentals of calculus.',
            'is_premium' => false,
        ]);
        $topics36 = [
            ['title' => 'What is Calculus?', 'description' => 'Understand the scope of calculus.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-calculus']), 'order' => 1],
            ['title' => 'Limits', 'description' => 'Learn the concept of limits.', 'resources' => json_encode(['https://www.youtube.com/watch?v=limits-basics']), 'order' => 2],
            ['title' => 'Derivatives', 'description' => 'Understand how to find derivatives.', 'resources' => json_encode(['https://www.youtube.com/watch?v=derivatives-basics']), 'order' => 3],
            ['title' => 'Integrals', 'description' => 'Learn the basics of integration.', 'resources' => json_encode(['https://www.youtube.com/watch?v=integrals-basics']), 'order' => 4],
            ['title' => 'Applications of Calculus', 'description' => 'Apply calculus to real-world problems.', 'resources' => json_encode(['https://www.youtube.com/watch?v=calculus-applications']), 'order' => 5],
        ];
        foreach ($topics36 as $topic) {
            Topic::create([
                'path_id' => $path36->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 37. Statistics for Beginners
        $path37 = LearningPath::create([
            'title' => 'Statistics for Beginners',
            'description' => 'Learn the basics of statistics.',
            'is_premium' => false,
        ]);
        $topics37 = [
            ['title' => 'What is Statistics?', 'description' => 'Understand the field of statistics.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-statistics']), 'order' => 1],
            ['title' => 'Mean, Median, Mode', 'description' => 'Learn measures of central tendency.', 'resources' => json_encode(['https://www.youtube.com/watch?v=mean-median-mode']), 'order' => 2],
            ['title' => 'Probability Basics', 'description' => 'Understand the basics of probability.', 'resources' => json_encode(['https://www.youtube.com/watch?v=probability-basics']), 'order' => 3],
            ['title' => 'Data Visualization', 'description' => 'Create bar charts and histograms.', 'resources' => json_encode(['https://www.youtube.com/watch?v=data-visualization-stats']), 'order' => 4],
            ['title' => 'Simple Statistical Analysis', 'description' => 'Analyze a small dataset.', 'resources' => json_encode(['https://www.youtube.com/watch?v=simple-stats-analysis']), 'order' => 5],
        ];
        foreach ($topics37 as $topic) {
            Topic::create([
                'path_id' => $path37->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 38. Environmental Science Basics
        $path38 = LearningPath::create([
            'title' => 'Environmental Science Basics',
            'description' => 'Learn about the environment and sustainability.',
            'is_premium' => false,
        ]);
        $topics38 = [
            ['title' => 'What is Environmental Science?', 'description' => 'Understand the field of study.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-env-science']), 'order' => 1],
            ['title' => 'Ecosystems', 'description' => 'Learn about ecosystems and biodiversity.', 'resources' => json_encode(['https://www.youtube.com/watch?v=ecosystems-env']), 'order' => 2],
            ['title' => 'Climate Change', 'description' => 'Understand the science of climate change.', 'resources' => json_encode(['https://www.youtube.com/watch?v=climate-change-basics']), 'order' => 3],
            ['title' => 'Sustainability', 'description' => 'Explore sustainable practices.', 'resources' => json_encode(['https://www.youtube.com/watch?v=sustainability-basics']), 'order' => 4],
            ['title' => 'Reducing Your Impact', 'description' => 'Learn how to live more sustainably.', 'resources' => json_encode(['https://www.youtube.com/watch?v=reduce-impact']), 'order' => 5],
        ];
        foreach ($topics38 as $topic) {
            Topic::create([
                'path_id' => $path38->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 39. Cooking for Beginners
        $path39 = LearningPath::create([
            'title' => 'Cooking for Beginners',
            'description' => 'Learn how to cook simple meals.',
            'is_premium' => false,
        ]);
        $topics39 = [
            ['title' => 'Kitchen Safety', 'description' => 'Learn how to stay safe while cooking.', 'resources' => json_encode(['https://www.youtube.com/watch?v=kitchen-safety']), 'order' => 1],
            ['title' => 'Knife Skills', 'description' => 'Master basic knife techniques.', 'resources' => json_encode(['https://www.youtube.com/watch?v=knife-skills']), 'order' => 2],
            ['title' => 'Cooking Techniques', 'description' => 'Understand boiling, frying, and baking.', 'resources' => json_encode(['https://www.youtube.com/watch?v=cooking-techniques']), 'order' => 3],
            ['title' => 'Simple Recipes', 'description' => 'Cook a basic meal like pasta.', 'resources' => json_encode(['https://www.youtube.com/watch?v=simple-recipes']), 'order' => 4],
            ['title' => 'Meal Planning', 'description' => 'Plan a week of meals.', 'resources' => json_encode(['https://www.youtube.com/watch?v=meal-planning']), 'order' => 5],
        ];
        foreach ($topics39 as $topic) {
            Topic::create([
                'path_id' => $path39->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 40. Baking Basics
        $path40 = LearningPath::create([
            'title' => 'Baking Basics',
            'description' => 'Learn how to bake bread, cakes, and pastries.',
            'is_premium' => false,
        ]);
        $topics40 = [
            ['title' => 'Baking Tools', 'description' => 'Understand essential baking tools.', 'resources' => json_encode(['https://www.youtube.com/watch?v=baking-tools']), 'order' => 1],
            ['title' => 'Measuring Ingredients', 'description' => 'Learn how to measure accurately.', 'resources' => json_encode(['https://www.youtube.com/watch?v=measuring-ingredients']), 'order' => 2],
            ['title' => 'Baking Bread', 'description' => 'Bake a simple loaf of bread.', 'resources' => json_encode(['https://www.youtube.com/watch?v=baking-bread']), 'order' => 3],
            ['title' => 'Baking Cakes', 'description' => 'Make a basic cake.', 'resources' => json_encode(['https://www.youtube.com/watch?v=baking-cakes']), 'order' => 4],
            ['title' => 'Baking Pastries', 'description' => 'Try making a simple pastry.', 'resources' => json_encode(['https://www.youtube.com/watch?v=baking-pastries']), 'order' => 5],
        ];
        foreach ($topics40 as $topic) {
            Topic::create([
                'path_id' => $path40->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 41. Personal Finance 101
        $path41 = LearningPath::create([
            'title' => 'Personal Finance 101',
            'description' => 'Learn how to manage your money effectively.',
            'is_premium' => false,
        ]);
        $topics41 = [
            ['title' => 'Budgeting Basics', 'description' => 'Learn how to create a budget.', 'resources' => json_encode(['https://www.youtube.com/watch?v=budgeting-basics']), 'order' => 1],
            ['title' => 'Saving Strategies', 'description' => 'Understand how to save money.', 'resources' => json_encode(['https://www.youtube.com/watch?v=saving-strategies']), 'order' => 2],
            ['title' => 'Understanding Debt', 'description' => 'Learn about managing debt.', 'resources' => json_encode(['https://www.youtube.com/watch?v=understanding-debt']), 'order' => 3],
            ['title' => 'Investing Basics', 'description' => 'Explore simple investment options.', 'resources' => json_encode(['https://www.youtube.com/watch?v=investing-basics']), 'order' => 4],
            ['title' => 'Financial Goals', 'description' => 'Set and achieve financial goals.', 'resources' => json_encode(['https://www.youtube.com/watch?v=financial-goals']), 'order' => 5],
        ];
        foreach ($topics41 as $topic) {
            Topic::create([
                'path_id' => $path41->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 42. Time Management Skills
        $path42 = LearningPath::create([
            'title' => 'Time Management Skills',
            'description' => 'Learn how to manage your time effectively.',
            'is_premium' => false,
        ]);
        $topics42 = [
            ['title' => 'Why Time Management?', 'description' => 'Understand the importance of time management.', 'resources' => json_encode(['https://www.youtube.com/watch?v=why-time-management']), 'order' => 1],
            ['title' => 'Prioritization', 'description' => 'Learn how to prioritize tasks.', 'resources' => json_encode(['https://www.youtube.com/watch?v=prioritization']), 'order' => 2],
            ['title' => 'Using Tools', 'description' => 'Use tools like Trello to organize tasks.', 'resources' => json_encode(['https://www.youtube.com/watch?v=time-management-tools']), 'order' => 3],
            ['title' => 'Avoiding Procrastination', 'description' => 'Tips to stop procrastinating.', 'resources' => json_encode(['https://www.youtube.com/watch?v=avoid-procrastination']), 'order' => 4],
            ['title' => 'Creating a Schedule', 'description' => 'Build a daily schedule.', 'resources' => json_encode(['https://www.youtube.com/watch?v=create-schedule']), 'order' => 5],
        ];
        foreach ($topics42 as $topic) {
            Topic::create([
                'path_id' => $path42->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 43. Fitness and Nutrition Basics
        $path43 = LearningPath::create([
            'title' => 'Fitness and Nutrition Basics',
            'description' => 'Learn how to stay healthy with fitness and nutrition.',
            'is_premium' => false,
        ]);
        $topics43 = [
            ['title' => 'What is Fitness?', 'description' => 'Understand the basics of fitness.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-fitness']), 'order' => 1],
            ['title' => 'Basic Exercises', 'description' => 'Learn simple exercises like push-ups.', 'resources' => json_encode(['https://www.youtube.com/watch?v=basic-exercises']), 'order' => 2],
            ['title' => 'Nutrition Basics', 'description' => 'Understand macronutrients and calories.', 'resources' => json_encode(['https://www.youtube.com/watch?v=nutrition-basics']), 'order' => 3],
            ['title' => 'Meal Planning', 'description' => 'Plan healthy meals for the week.', 'resources' => json_encode(['https://www.youtube.com/watch?v=meal-planning-health']), 'order' => 4],
            ['title' => 'Creating a Routine', 'description' => 'Build a weekly fitness routine.', 'resources' => json_encode(['https://www.youtube.com/watch?v=fitness-routine']), 'order' => 5],
        ];
        foreach ($topics43 as $topic) {
            Topic::create([
                'path_id' => $path43->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 44. Mindfulness and Meditation
        $path44 = LearningPath::create([
            'title' => 'Mindfulness and Meditation',
            'description' => 'Learn how to practice mindfulness and reduce stress.',
            'is_premium' => false,
        ]);
        $topics44 = [
            ['title' => 'What is Mindfulness?', 'description' => 'Understand the basics of mindfulness.', 'resources' => json_encode(['https://www.youtube.com/watch?v=what-is-mindfulness']), 'order' => 1],
            ['title' => 'Breathing Exercises', 'description' => 'Learn simple breathing techniques.', 'resources' => json_encode(['https://www.youtube.com/watch?v=breathing-exercises']), 'order' => 2],
            ['title' => 'Meditation Basics', 'description' => 'Start with a 5-minute meditation.', 'resources' => json_encode(['https://www.youtube.com/watch?v=meditation-basics']), 'order' => 3],
            ['title' => 'Reducing Stress', 'description' => 'Use mindfulness to manage stress.', 'resources' => json_encode(['https://www.youtube.com/watch?v=reduce-stress-mindfulness']), 'order' => 4],
            ['title' => 'Daily Mindfulness Practice', 'description' => 'Incorporate mindfulness into your routine.', 'resources' => json_encode(['https://www.youtube.com/watch?v=daily-mindfulness']), 'order' => 5],
        ];
        foreach ($topics44 as $topic) {
            Topic::create([
                'path_id' => $path44->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 45. Public Speaking 101
        $path45 = LearningPath::create([
            'title' => 'Public Speaking 101',
            'description' => 'Learn how to speak confidently in front of an audience.',
            'is_premium' => false,
        ]);
        $topics45 = [
            ['title' => 'Overcoming Fear', 'description' => 'Tips to reduce public speaking anxiety.', 'resources' => json_encode(['https://www.youtube.com/watch?v=overcome-fear-speaking']), 'order' => 1],
            ['title' => 'Speech Structure', 'description' => 'Learn how to structure a speech.', 'resources' => json_encode(['https://www.youtube.com/watch?v=speech-structure']), 'order' => 2],
            ['title' => 'Body Language', 'description' => 'Use gestures and posture effectively.', 'resources' => json_encode(['https://www.youtube.com/watch?v=body-language-speaking']), 'order' => 3],
            ['title' => 'Voice Modulation', 'description' => 'Practice tone and pacing.', 'resources' => json_encode(['https://www.youtube.com/watch?v=voice-modulation']), 'order' => 4],
            ['title' => 'Your First Speech', 'description' => 'Deliver a short speech to a small group.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-speech']), 'order' => 5],
        ];
        foreach ($topics45 as $topic) {
            Topic::create([
                'path_id' => $path45->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 46. Gardening for Beginners
        $path46 = LearningPath::create([
            'title' => 'Gardening for Beginners',
            'description' => 'Learn how to start a small garden.',
            'is_premium' => false,
        ]);
        $topics46 = [
            ['title' => 'Gardening Tools', 'description' => 'Understand essential gardening tools.', 'resources' => json_encode(['https://www.youtube.com/watch?v=gardening-tools']), 'order' => 1],
            ['title' => 'Soil Preparation', 'description' => 'Learn how to prepare soil for planting.', 'resources' => json_encode(['https://www.youtube.com/watch?v=soil-preparation']), 'order' => 2],
            ['title' => 'Planting Seeds', 'description' => 'Start with easy plants like herbs.', 'resources' => json_encode(['https://www.youtube.com/watch?v=planting-seeds']), 'order' => 3],
            ['title' => 'Watering and Maintenance', 'description' => 'Understand how to care for plants.', 'resources' => json_encode(['https://www.youtube.com/watch?v=watering-maintenance']), 'order' => 4],
            ['title' => 'Harvesting Basics', 'description' => 'Learn when and how to harvest.', 'resources' => json_encode(['https://www.youtube.com/watch?v=harvesting-basics']), 'order' => 5],
        ];
        foreach ($topics46 as $topic) {
            Topic::create([
                'path_id' => $path46->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 47. Chess Fundamentals
        $path47 = LearningPath::create([
            'title' => 'Chess Fundamentals',
            'description' => 'Learn the basics of chess and start playing.',
            'is_premium' => false,
        ]);
        $topics47 = [
            ['title' => 'Chess Rules', 'description' => 'Understand the basic rules of chess.', 'resources' => json_encode(['https://www.youtube.com/watch?v=chess-rules']), 'order' => 1],
            ['title' => 'Piece Movements', 'description' => 'Learn how each piece moves.', 'resources' => json_encode(['https://www.youtube.com/watch?v=piece-movements']), 'order' => 2],
            ['title' => 'Basic Strategies', 'description' => 'Master opening moves and control the center.', 'resources' => json_encode(['https://www.youtube.com/watch?v=basic-strategies-chess']), 'order' => 3],
            ['title' => 'Check and Checkmate', 'description' => 'Learn how to win a game.', 'resources' => json_encode(['https://www.youtube.com/watch?v=check-checkmate']), 'order' => 4],
            ['title' => 'Playing Your First Game', 'description' => 'Play a full game of chess.', 'resources' => json_encode(['https://www.youtube.com/watch?v=first-chess-game']), 'order' => 5],
        ];
        foreach ($topics47 as $topic) {
            Topic::create([
                'path_id' => $path47->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 48. Advanced Chess Strategies
        $path48 = LearningPath::create([
            'title' => 'Advanced Chess Strategies',
            'description' => 'Improve your chess skills with advanced techniques.',
            'is_premium' => true,
        ]);
        $topics48 = [
            ['title' => 'Chess Openings', 'description' => 'Learn popular openings like the Sicilian Defense.', 'resources' => json_encode(['https://www.youtube.com/watch?v=chess-openings']), 'order' => 1],
            ['title' => 'Tactics and Combinations', 'description' => 'Master forks, pins, and skewers.', 'resources' => json_encode(['https://www.youtube.com/watch?v=chess-tactics']), 'order' => 2],
            ['title' => 'Endgame Techniques', 'description' => 'Learn how to win in the endgame.', 'resources' => json_encode(['https://www.youtube.com/watch?v=endgame-techniques']), 'order' => 3],
            ['title' => 'Positional Play', 'description' => 'Understand how to control the board.', 'resources' => json_encode(['https://www.youtube.com/watch?v=positional-play']), 'order' => 4],
            ['title' => 'Analyzing Your Games', 'description' => 'Review your games to improve.', 'resources' => json_encode(['https://www.youtube.com/watch?v=analyze-chess-games']), 'order' => 5],
        ];
        foreach ($topics48 as $topic) {
            Topic::create([
                'path_id' => $path48->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 49. Board Game Design Basics
        $path49 = LearningPath::create([
            'title' => 'Board Game Design Basics',
            'description' => 'Learn how to design your own board game.',
            'is_premium' => false,
        ]);
        $topics49 = [
            ['title' => 'What Makes a Good Game?', 'description' => 'Understand game design principles.', 'resources' => json_encode(['https://www.youtube.com/watch?v=good-game-design']), 'order' => 1],
            ['title' => 'Game Mechanics', 'description' => 'Learn about different mechanics.', 'resources' => json_encode(['https://www.youtube.com/watch?v=game-mechanics']), 'order' => 2],
            ['title' => 'Prototyping', 'description' => 'Create a simple prototype with paper.', 'resources' => json_encode(['https://www.youtube.com/watch?v=prototyping-board-game']), 'order' => 3],
            ['title' => 'Playtesting', 'description' => 'Test your game with friends.', 'resources' => json_encode(['https://www.youtube.com/watch?v=playtesting-board-game']), 'order' => 4],
            ['title' => 'Refining Your Game', 'description' => 'Make improvements based on feedback.', 'resources' => json_encode(['https://www.youtube.com/watch?v=refine-board-game']), 'order' => 5],
        ];
        foreach ($topics49 as $topic) {
            Topic::create([
                'path_id' => $path49->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }

        // 50. Introduction to Astronomy Photography
        $path50 = LearningPath::create([
            'title' => 'Introduction to Astronomy Photography',
            'description' => 'Learn how to photograph the night sky.',
            'is_premium' => false,
        ]);
        $topics50 = [
            ['title' => 'Astronomy Photography Basics', 'description' => 'Understand the basics of astrophotography.', 'resources' => json_encode(['https://www.youtube.com/watch?v=astronomy-photography-basics']), 'order' => 1],
            ['title' => 'Equipment Needed', 'description' => 'Learn about cameras and tripods.', 'resources' => json_encode(['https://www.youtube.com/watch?v=astro-photography-equipment']), 'order' => 2],
            ['title' => 'Camera Settings', 'description' => 'Set up your camera for night photography.', 'resources' => json_encode(['https://www.youtube.com/watch?v=astro-camera-settings']), 'order' => 3],
            ['title' => 'Capturing the Stars', 'description' => 'Take your first photo of the stars.', 'resources' => json_encode(['https://www.youtube.com/watch?v=capture-stars']), 'order' => 4],
            ['title' => 'Editing Astro Photos', 'description' => 'Edit your photos to enhance details.', 'resources' => json_encode(['https://www.youtube.com/watch?v=edit-astro-photos']), 'order' => 5],
        ];
        foreach ($topics50 as $topic) {
            Topic::create([
                'path_id' => $path50->id,
                'title' => $topic['title'],
                'description' => $topic['description'],
                'resources' => $topic['resources'],
                'order' => $topic['order'],
            ]);
        }
    }
}