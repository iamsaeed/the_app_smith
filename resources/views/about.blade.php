<x-app-layout>
  <!-- Hero Section -->
  <section class="relative pt-24 md:pt-28 lg:pt-32 pb-12 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="absolute inset-0 bg-white/40 z-0"></div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 opacity-0 transform translate-y-4 transition duration-700 ease-out fade-in">
          About Me
        </h1>
        <p class="text-lg md:text-xl text-gray-600 mb-8 max-w-2xl mx-auto opacity-0 transform translate-y-4 transition duration-700 delay-100 ease-out fade-in">
          Passionate software developer with a focus on creating elegant solutions to complex problems
        </p>
      </div>
    </div>
  </section>

  <!-- Personal Info Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <!-- Profile Image -->
          <div class="relative">
            <div class="aspect-w-4 aspect-h-5 rounded-lg overflow-hidden shadow-xl">
              <img
                src="https://images.unsplash.com/photo-1537511446984-935f663eb1f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="Professional headshot"
                class="w-full h-full object-cover"
              >
            </div>
            <!-- Decorative Elements -->
            <div class="absolute -bottom-6 -right-6 w-64 h-64 bg-blue-100 rounded-full opacity-20 z-0"></div>
            <div class="absolute -top-6 -left-6 w-48 h-48 bg-indigo-100 rounded-full opacity-20 z-0"></div>
          </div>

          <!-- Bio Content -->
          <div class="relative z-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Hi, I'm John Doe</h2>
            <p class="text-lg text-gray-600 mb-6">
              With over 8 years of experience in software development, I specialize in creating robust web applications
              and innovative mobile solutions. My passion lies in transforming complex problems into simple, beautiful,
              and intuitive designs.
            </p>
            <p class="text-lg text-gray-600 mb-8">
              I believe in writing clean, maintainable code and staying up-to-date with the latest technologies
              and best practices in the ever-evolving tech landscape.
            </p>
            <div class="flex flex-wrap gap-4">
              <a href="/contact" class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md shadow-md hover:bg-blue-700 transition transform hover:scale-105">
                Get in Touch
              </a>
              <a href="/resume.pdf" class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 transition">
                Download Resume
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Skills Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">My Skills</h2>
          <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            A comprehensive set of technical skills and expertise gained through years of hands-on experience
          </p>
        </div>

        <!-- Skills Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Frontend Development -->
          <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-4">Frontend Development</h3>
            <ul class="space-y-2 text-gray-600">
              <li>React.js / Next.js</li>
              <li>Vue.js / Nuxt.js</li>
              <li>Tailwind CSS</li>
              <li>JavaScript / TypeScript</li>
            </ul>
          </div>

          <!-- Backend Development -->
          <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
              <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-4">Backend Development</h3>
            <ul class="space-y-2 text-gray-600">
              <li>Node.js / Express.js</li>
              <li>Python / Django</li>
              <li>PHP / Laravel</li>
              <li>RESTful APIs</li>
            </ul>
          </div>

          <!-- Database & DevOps -->
          <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
              <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-4">Database & DevOps</h3>
            <ul class="space-y-2 text-gray-600">
              <li>MySQL / PostgreSQL</li>
              <li>MongoDB / Redis</li>
              <li>Docker / Kubernetes</li>
              <li>AWS / Google Cloud</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Experience Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">Professional Experience</h2>
          <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            A track record of delivering successful projects and driving innovation
          </p>
        </div>

        <!-- Timeline -->
        <div class="space-y-8">
          <!-- Experience Item 1 -->
          <div class="relative pl-8 sm:pl-32 py-6 group">
            <div class="flex flex-col sm:flex-row items-start mb-1 group-hover:text-blue-600 transition">
              <div class="sm:w-32 sm:absolute left-0 text-blue-600 font-medium">2020 - Present</div>
              <div class="text-xl font-bold">Senior Software Engineer</div>
            </div>
            <div class="flex flex-col sm:flex-row text-gray-600 mb-4">
              <div class="sm:w-32 sm:absolute left-0 italic">Tech Corp Inc.</div>
              <div class="text-gray-600">San Francisco, CA</div>
            </div>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
              <li>Led development of enterprise-scale web applications</li>
              <li>Mentored junior developers and conducted code reviews</li>
              <li>Implemented CI/CD pipelines reducing deployment time by 60%</li>
            </ul>
          </div>

          <!-- Experience Item 2 -->
          <div class="relative pl-8 sm:pl-32 py-6 group">
            <div class="flex flex-col sm:flex-row items-start mb-1 group-hover:text-blue-600 transition">
              <div class="sm:w-32 sm:absolute left-0 text-blue-600 font-medium">2017 - 2020</div>
              <div class="text-xl font-bold">Full Stack Developer</div>
            </div>
            <div class="flex flex-col sm:flex-row text-gray-600 mb-4">
              <div class="sm:w-32 sm:absolute left-0 italic">StartUp Labs</div>
              <div class="text-gray-600">New York, NY</div>
            </div>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
              <li>Developed and maintained multiple client applications</li>
              <li>Optimized database queries improving performance by 40%</li>
              <li>Integrated third-party APIs and payment gateways</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">What Clients Say</h2>
          <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Feedback from clients and colleagues I've had the pleasure to work with
          </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Testimonial 1 -->
          <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition">
            <div class="flex items-center mb-4">
              <img
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                alt="Sarah Johnson"
                class="w-12 h-12 rounded-full object-cover mr-4"
              >
              <div>
                <h4 class="font-bold text-gray-900">Sarah Johnson</h4>
                <p class="text-gray-600">CEO, TechStart</p>
              </div>
            </div>
            <p class="text-gray-600 italic">
              "John's expertise and attention to detail transformed our project. His ability to understand our needs
              and deliver beyond expectations was impressive."
            </p>
          </div>

          <!-- Testimonial 2 -->
          <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition">
            <div class="flex items-center mb-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80"
                alt="Mark Thompson"
                class="w-12 h-12 rounded-full object-cover mr-4"
              >
              <div>
                <h4 class="font-bold text-gray-900">Mark Thompson</h4>
                <p class="text-gray-600">CTO, InnovateCo</p>
              </div>
            </div>
            <p class="text-gray-600 italic">
              "Working with John was a game-changer for our team. His technical knowledge and problem-solving
              skills are exceptional."
            </p>
          </div>

          <!-- Testimonial 3 -->
          <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition">
            <div class="flex items-center mb-4">
              <img
                src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                alt="Emily Chen"
                class="w-12 h-12 rounded-full object-cover mr-4"
              >
              <div>
                <h4 class="font-bold text-gray-900">Emily Chen</h4>
                <p class="text-gray-600">Product Manager, DevFlow</p>
              </div>
            </div>
            <p class="text-gray-600 italic">
              "John's commitment to quality and his innovative approach to problem-solving made him an invaluable
              asset to our project."
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
