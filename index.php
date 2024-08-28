<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let experienceCount = 0;
            let projectCount = 0;
            let skillCount = 0;

            // Function to add a new experience section
            function addExperience() {
                experienceCount++;
                const experienceSection = document.createElement('div');
                experienceSection.classList.add('flex', 'flex-col', 'space-y-4', 'mt-6');
                experienceSection.innerHTML = `
                    <div class="space-y-2">
                        <label for="experience-${experienceCount}-title" class="block text-sm font-medium text-gray-700">Job Title:</label>
                        <input type="text" id="experience-${experienceCount}-title" name="experience-${experienceCount}-title" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="space-y-2">
                        <label for="experience-${experienceCount}-company" class="block text-sm font-medium text-gray-700">Company:</label>
                        <input type="text" id="experience-${experienceCount}-company" name="experience-${experienceCount}-company" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="space-y-2">
                        <label for="experience-${experienceCount}-details" class="block text-sm font-medium text-gray-700">Details:</label>
                        <textarea id="experience-${experienceCount}-details" name="experience-${experienceCount}-details" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                    </div>
                `;
                document.getElementById('experience-container').appendChild(experienceSection);
            }

            // Function to add a new project section
            function addProject() {
                projectCount++;
                const projectSection = document.createElement('div');
                projectSection.classList.add('flex', 'flex-col', 'space-y-4', 'mt-6');
                projectSection.innerHTML = `
                    <div class="space-y-2">
                        <label for="project-${projectCount}-title" class="block text-sm font-medium text-gray-700">Project Title:</label>
                        <input type="text" id="project-${projectCount}-title" name="project-${projectCount}-title" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="space-y-2">
                        <label for="project-${projectCount}-description" class="block text-sm font-medium text-gray-700">Description:</label>
                        <textarea id="project-${projectCount}-description" name="project-${projectCount}-description" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                    </div>
                    <div class="space-y-2">
                        <label for="project-${projectCount}-url" class="block text-sm font-medium text-gray-700">Project URL:</label>
                        <input type="url" id="project-${projectCount}-url" name="project-${projectCount}-url" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                `;
                document.getElementById('project-container').appendChild(projectSection);
            }

            // Function to add a new skill section
            function addSkill() {
                skillCount++;
                const skillSection = document.createElement('div');
                skillSection.classList.add('flex', 'flex-col', 'space-y-4', 'mt-6');
                skillSection.innerHTML = `
                    <div class="space-y-2">
                        <label for="skill-${skillCount}" class="block text-sm font-medium text-gray-700">Skill:</label>
                        <input type="text" id="skill-${skillCount}" name="skill-${skillCount}" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                `;
                document.getElementById('skills-container').appendChild(skillSection);
            }

            // Event listeners for adding experiences, projects, and skills
            document.getElementById('add-experience').addEventListener('click', addExperience);
            document.getElementById('add-project').addEventListener('click', addProject);
            document.getElementById('add-skill').addEventListener('click', addSkill);
        });
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <form action="generate_resume.php" method="POST" class="bg-white p-8 rounded-lg shadow-lg w-full max-w-5xl space-y-6">
        <h1 class="text-3xl font-semibold mb-6">Generate Your Resume</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="space-y-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="space-y-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address:</label>
                <input type="text" id="address" name="address" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div class="space-y-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone:</label>
                <input type="text" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div class="flex flex-col space-y-4 mt-8">
            <label for="education" class="block text-sm font-medium text-gray-700">Education:</label>
            <textarea id="education" name="education" rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
        </div>

        <div class="flex flex-col space-y-6 mt-8">
            <h2 class="text-2xl font-semibold mb-4">Experience</h2>
            <div id="experience-container">
                <!-- Dynamic experience entries will be added here -->
            </div>
        </div>

        <button type="button" id="add-experience" class="w-full px-4 py-3 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Add Experience</button>

        <div class="flex flex-col space-y-6 mt-8">
            <h2 class="text-2xl font-semibold mb-4">Projects</h2>
            <div id="project-container">
                <!-- Dynamic project entries will be added here -->
            </div>
        </div>

        <button type="button" id="add-project" class="w-full px-4 py-3 bg-blue-600 text-white font-semibold rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Add Project</button>

        <div class="flex flex-col space-y-6 mt-8">
            <h2 class="text-2xl font-semibold mb-4">Skills</h2>
            <div id="skills-container">
                <!-- Dynamic skill entries will be added here -->
            </div>
        </div>

        <button type="button" id="add-skill" class="w-full px-4 py-3 bg-yellow-600 text-white font-semibold rounded-md shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">Add Skill</button>

        <div class="flex flex-col md:flex-row md:space-x-6 mt-8">
            <div class="flex-1 space-y-4">
                <label for="github" class="block text-sm font-medium text-gray-700">GitHub:</label>
                <input type="url" id="github" name="github" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div class="flex-1 space-y-4">
                <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn:</label>
                <input type="url" id="linkedin" name="linkedin" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div class="flex-1 space-y-4">
                <label for="personal-homepage" class="block text-sm font-medium text-gray-700">Personal Homepage:</label>
                <input type="url" id="personal-homepage" name="personal-homepage" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <button type="submit" class="w-full px-4 py-3 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Generate Resume</button>
    </form>
</body>
</html>
