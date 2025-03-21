<x-app-layout title="Privacy Policy">
    <div class="pt-24 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-4xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">Privacy Policy</h1>

            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="prose prose-blue max-w-none">
                    <p class="lead text-lg text-gray-600 mb-8">
                        At {{ config('app.name') }}, we respect your privacy and are committed to protecting your personal data.
                        This Privacy Policy explains how we collect, use, and safeguard your information when you visit our website.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">Information We Collect</h2>
                    <p>We may collect several types of information from and about users of our website, including:</p>
                    <ul class="list-disc pl-6 mb-6 text-gray-600">
                        <li>Personal information you provide to us (such as name, email address, and phone number) when filling out forms on our website, such as our contact form</li>
                        <li>Information about your internet connection, the equipment you use to access our website, and usage details</li>
                        <li>Non-personal information about your interactions with our website through cookies and similar technologies</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">How We Use Your Information</h2>
                    <p>We may use the information we collect about you for the following purposes:</p>
                    <ul class="list-disc pl-6 mb-6 text-gray-600">
                        <li>To present our website and its contents to you</li>
                        <li>To provide you with information, products, or services that you request from us</li>
                        <li>To respond to your inquiries and provide customer service</li>
                        <li>To notify you about changes to our website or any products or services we offer</li>
                        <li>To improve our website, products, services, and customer experience</li>
                        <li>For any other purpose with your consent</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">Data Security</h2>
                    <p>
                        We implement appropriate security measures to protect your personal information. However,
                        the transmission of information via the internet is not completely secure. While we strive to use commercially
                        acceptable means to protect your personal information, we cannot guarantee its absolute security.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">Cookies and Similar Technologies</h2>
                    <p>
                        Our website uses cookies to enhance your experience, gather general visitor information, and track visits to our website.
                        You can choose to disable cookies through your browser settings, but this may affect your ability to use certain features of our website.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">Third-Party Services</h2>
                    <p>
                        We may use third-party service providers to assist us in operating our website, conducting business,
                        or providing services to you. These service providers may have access to your personal information to perform these tasks on our behalf.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">Your Choices</h2>
                    <p>You can choose not to provide personal information through our website. However, this may prevent you from engaging with certain features of our site.</p>

                    <p>You have the right to:</p>
                    <ul class="list-disc pl-6 mb-6 text-gray-600">
                        <li>Request access to your personal data</li>
                        <li>Request correction of your personal data</li>
                        <li>Request erasure of your personal data</li>
                        <li>Object to processing of your personal data</li>
                        <li>Request restriction of processing your personal data</li>
                        <li>Request transfer of your personal data</li>
                        <li>Withdraw consent</li>
                    </ul>

                    <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">Changes to Our Privacy Policy</h2>
                    <p class="mb-6">
                        We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.
                        You are advised to review this Privacy Policy periodically for any changes.
                    </p>

                    <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">Contact Us</h2>
                    <p class="mb-10">
                        If you have any questions about this Privacy Policy, please contact us at:
                    </p>

                    <div class="bg-blue-50 p-6 rounded-lg mb-8 text-center">
                        <p class="text-gray-700">
                            <strong>Email:</strong> <a href="mailto:{{ config('app.contact.email') }}" class="text-blue-600 hover:underline">{{ config('app.contact.email') }}</a>
                        </p>
                        <p class="text-gray-700 mt-2">
                            <strong>Phone:</strong> <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('app.contact.phone')) }}" class="text-blue-600 hover:underline">{{ config('app.contact.phone') }}</a>
                        </p>
                        <p class="text-gray-700 mt-2">
                            <strong>Address:</strong> <span class="text-gray-600">{{ config('app.contact.address') }}</span>
                        </p>
                        <p class="text-gray-700 mt-2">
                            <strong>Last Updated:</strong> {{ date('F d, Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
